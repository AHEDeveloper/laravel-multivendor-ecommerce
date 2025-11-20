<?php

namespace App\Livewire\Seller\Auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;

class Index extends Component
{
    public function submit($formData)
    {
        $validator = Validator::make($formData,[
            'email' => 'required|exists:admins,email',
            'password' => 'required'
        ],[
            '*.exists' => 'ایمیل وجود',
            '*.required' => 'این فیلد واجب هست ان را پر کنید',
        ]);
        $validator->validate();
        $this->resetValidation();
        $credentials = ['email' => $formData['email'],'password' => $formData['password']];
        $seller = Auth::guard('seller');
        if ($seller->attempt($credentials))
        {
            return redirect(route('seller.dashboard.index'));
        }else{
            session()->flash('message','ایمیل یا رمز عبور اشتباه است.');
        }
    }

    public function render()
    {
        return view('livewire.seller.auth.index')->layout('layouts.admin.auth');
    }
}
