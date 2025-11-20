<?php

namespace App\Livewire\Client\Shipping;

use App\Contracts\PaymentGateWayInterface;
use App\Models\Address;
use App\Models\Cart;
use App\Models\City;
use App\Models\Coupons;
use App\Models\DeliveryMethod;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use App\Models\State;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Livewire\Component;
use function Laravel\Prompts\alert;

class Index extends Component
{
       //variableModal
    public $address;
    public $state;
    public $city;
    public $mobile;
    public $postal_code;
        //endVariableModal
    public $totalOriginalPrice;
    public $totalDiscountAmount;

    public $totalDiscountPrice;
    public $totalProductCount;
    public $deliveryPrice;
    public $deliveryId;
//    public $addressId;
    public $deliveryCodeAmount = 0;
    public $totalAmount;
    public $valueInToman;
    public $showDiscountCode = false;
    public $discountCodeAmount;

    public $addressId = null;
    public $states = [];
    public $citys = [];
    public $deliverys = [];

    public function mount()
    {
        if (session()->has('invoice'))
        {
            $invoice = session()->get('invoice');
            $this->totalOriginalPrice = $invoice['totalOriginalPrice'];
            $this->totalDiscountAmount = $invoice['totalDiscountAmount'];
            $this->totalDiscountPrice = $invoice['totalDiscountPrice'];
            $this->totalProductCount = $invoice['totalProductCount'];

        }
        else
        {
            return redirect(route('client.cart.index'));
        }
//        $this->deliveryPrice = DeliveryMethod::query()->pluck('price')->first();
        $this->deliveryId = DeliveryMethod::query()->pluck('id')->first();
//        $this->addressId = Address::query()->pluck('id')->first();
        $this->deliverys = DeliveryMethod::query()->get();
        $this->totalAmountPayment($this->totalDiscountPrice,$this->deliveryPrice,$this->deliveryCodeAmount);
    }

    public function addressCheck($address_id)
    {
        $address = Address::query()->where('id',$address_id)->first();
        $this->addressId = $address->id;
    }

    public function totalAmountPayment($discountPrice,$deliveryPrice,$deliveryCodeAmount)
    {
        $this->totalAmount = ($discountPrice + $deliveryPrice) - $deliveryCodeAmount;
    }

    public function submitAddress($formData)
    {
        $validator = Validator::make($formData, [
            'address' => 'required|string|min:10|max:100',
            'state' => 'required|exists:states,id',
            'city' => 'required|exists:cities,id',
            'postal_code' => ['required', 'regex:/^[1-9][0-9]{9}$/'],
//            'mobile' => ['required', 'regex:/^09\d{9}$/'],
        ], [
            '*.required' => 'فیلد ضروری است.',
            '*.string' => 'فرمت اشتباه است !',
            '*.max' => 'حداکثر تعداد کاراکترها : 100',
            '*.min' => 'حداکثر تعداد کاراکترها : 10',
            'province.exists' => 'استان نامعتبر است .',
            'city.exists' => 'شهر نامعتبر است .',
            'postal_code.regex' => 'کد پستی باید یک عدد ۱۰ رقمی باشد که با صفر شروع نشود.',
            'mobile.regex' => 'شماره موبایل باید با 09 شروع شود و با 11 رقم تمام شود',
        ]);
        $validator->validate();
        Address::query()->updateOrCreate(
            [
                'id' => $this->addressId
            ],
            [
                'mobile' => $formData['mobile'],
                'postal_code' => $formData['postal_code'],
                'address' => $formData['address'],
                'country_id' => 1,
                'state_id' => $formData['state'],
                'city_id' => $formData['city'],
                'user_id' => Auth::id()
            ]
        );
        $this->addressId = null;
        $this->reset('address','state','city','mobile','postal_code');
        $this->dispatch('close-modal');
    }

    public function getState($type)
    {
        if ($type=='add')
        {
            $this->reset('address','state','city','mobile','postal_code');
            $this->states = State::query()->select('id','name')->get();

        }
    }

    public function getCity($state_id)
    {
        $this->citys = City::query()->where('state_id',$state_id)->get();
    }

    public function editAddress($address_id)
    {
        $address = Address::query()->where('id', $address_id)->first();
        if ($address)
        {
            $this->addressId = $address->id;
            $this->address = $address->address;
            $this->mobile = $address->mobile;
            $this->getState('edit');
            $this->state = $address->state_id;
            $this->getCity($address->state_id);
            $this->city = $address->city_id;
            $this->postal_code = $address->postal_code;
        }
    }

    public function changeDeliveryPrice($delivery_id)
    {
        $delivery = DeliveryMethod::query()->where('id',$delivery_id)->first();
        $this->deliveryPrice = $delivery->price;
        $this->deliveryId = $delivery->id;
        $this->totalAmountPayment($this->totalDiscountPrice,$delivery->price,$this->discountCodeAmount);
    }

    public function checkQuantity($cartItems)
    {
        foreach ($cartItems as $cartItem) {
            $product = Product::query()->where('id', $cartItem->product_id)->first();
            if ($product->stock < $cartItem->quantity) {
                return back()->withErrors(['error' => "موجودی محصول{$product->name}کافی نیست."]);
            }
        }
    }

    public function createPayment($order,$orderNumber)
    {
       Payment::query()->create([
           'order_id' => $order->id,
           'user_id' => Auth::id(),
           'amount' => $this->totalAmount,
           'order_number' => $orderNumber,
       ]);
    }

    public function createOrderItem($cartItems,$order)
    {
      foreach ($cartItems as $cartItem)
      {
          $product = Product::query()->where('id',$cartItem->product_id)->first();
          OrderItem::query()->create([
            'quantity' => $cartItem->quantity,
              'price' => $product->price,
              'order_id' => $order->id,
              'product_id' => $product->id
          ]);
      }
    }

    public function createOrder($orderNumber,$paymentMethodId)
    {
        return Order::query()->create([
            'amount' => $this->totalAmount,
            'order_number' => $orderNumber,
            'user_id' => Auth::id(),
            'payment_method_id' => $paymentMethodId,
            'delivery_method_id' => $this->deliveryId,
            'address_id' => $this->addressId,
        ]);
    }
    public function submitOrderBeforePayment($cartItems,$paymentMethodId,$orderNumber)
    {
        DB::transaction(function () use($cartItems,$paymentMethodId,$orderNumber){
            $order = $this->createOrder($orderNumber,$paymentMethodId);
            $this->createOrderItem($cartItems,$order);
            $this->createPayment($order,$orderNumber);
            $this->checkQuantity($cartItems);
        });
    }

    public function submitOrder(PaymentGateWayInterface $paymentGateWay)
    {
          if ($this->addressId)
          {
              if ($this->deliveryId)
              {
                  $cartItems = Cart::query()->where('user_id',Auth::id())->get();
                  $orderNumber = 'Ref-'.Str::uuid()->toString();
                  $this->submitOrderBeforePayment($cartItems,$paymentGateWay->getPaymentMethodId(),$orderNumber);
                  $paymentGateWay->request($this->totalAmount,$orderNumber);
              }
          }
    }

    public function codeSubmit($formData)
    {
        $validator = Validator::make($formData, [
            'code' => 'required|string|exists:coupons,code|min:4|max:6',
        ], [
            'code.required' => 'فیلد ضروری است.',
            'code.string' => 'فرمت اشتباه است !',
            'code.max' => 'حداکثر تعداد کاراکترها : 6',
            'code.min' => 'حداکثر تعداد کاراکترها : 4',
            'code.exists' => 'کد تخفیف وارد شده معتبر نیست.',

        ]);
        $validator->validate();
        $this->resetValidation();
        $code = Coupons::query()->where('code', $formData['code'])->first();
        $this->applyDiscount($code);
    }

    public function applyDiscount($code)
    {
        if (!$code->is_active || Carbon::parse($code->expires_at)->isPast()) {
            \session()->flash('error', 'این کد تخفیف معتبر نیست یا منقصی شده');
            return;
        }
        if (($this->totalAmount < $code->min_purchase) || $code->limit <= 0) {
            \session()->flash('error', 'شرایط استفاده از این کد تخفیف برقرار نیست');
            return;
        }
        if ($code->type == 'percent') {
            $this->valueInToman = $code->value / 10;
        } else {
            $this->valueInToman = $code->value;
        }
        $this->discountCodeAmount = $discount = $this->valueInToman;
        $this->totalAmountPayment($this->totalDiscountPrice, $this->deliveryPrice, $discount);
        $this->showDiscountCode = true;
        $code->update(['limit' => $code->limit -1]);
        \session()->flash('success', 'کد تخفیف با موفقیت اعمال شد');
    }

    public function render()
    {
        $addressLists = Address::query()->where('user_id',Auth::id())
            ->with('user')
            ->get();
        return view('livewire.client.shipping.index',[
            'addressLists' => $addressLists
        ])->layout('layouts.client.app-shipping');
    }
}
