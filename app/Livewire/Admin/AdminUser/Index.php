<?php

namespace App\Livewire\Admin\AdminUser;

use App\Models\Admin;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class Index extends Component
{
    public $roles = [];
    public $permissions = [];
    public $selectedRoles = [];
    public $selectedPermissions = [];

    public function mount()
    {
        $this->roles = Role::all();
        $this->permissions = Permission::all();
    }

    public function submit($formData)
    {
        $formData['selectedRoles'] = $this->selectedRoles;
        $formData['selectedPermissions'] = $this->selectedPermissions;
        $validator = Validator::make($formData, [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
//            'mobile' => 'required|regex:/^09[0-9]{9}$/|unique:admins,mobile',
            'selectedRoles' => 'required|array',
            'selectedRoles.*' => 'exists:roles,id',
            'selectedPermissions' => 'required|array',
            'selectedPermissions.*' => 'exists:permissions,id',
        ]);
        $validator->validate();
        $this->resetValidation();
        $password = $this->generatePassword();
        $admin = Admin::query()->create([
           'name' => $formData['name'],
           'email' => $formData['email'],
           'mobile' => $formData['mobile'],
           'password' => Hash::make($password)
        ]);
        $admin->roles()->sync($this->selectedRoles);
        $admin->permissions()->sync($this->selectedPermissions);
        session()->flash('message','پسورد شما با موفیقت ایجاد شد,پسورد:'.$password);
    }

    public function generatePassword($length = 12)
    {
// کاراکترهای مختلف
        $numbers = '0123456789';
        $lowercase = 'abcdefghijklmnopqrstuvwxyz';
        $uppercase = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $symbols = '@!#$%^&*().+-=[]{}<>?,;';

// حداقل یک عدد، یک حرف کوچک، یک حرف بزرگ و یک سیمبل اضافه می‌کنیم
        $password = [
            $numbers[random_int(0, strlen($numbers) - 1)],
            $lowercase[random_int(0, strlen($lowercase) - 1)],
            $uppercase[random_int(0, strlen($uppercase) - 1)],
            $symbols[random_int(0, strlen($symbols) - 1)],
        ];
// کاراکترهای تصادفی دیگر اضافه می‌کنیم
        $allCharacters = $numbers . $lowercase . $uppercase . $symbols;
        while (count($password) < $length) {
            $char = $allCharacters[random_int(0, strlen($allCharacters) - 1)];

            // بررسی عدم کنار هم قرار گرفتن کاراکتر پشت سر هم
            if (count($password) > 0 && $password[count($password) - 1] === $char) {
                continue;
            }

            $password[] = $char;
        }

// مخلوط کردن کاراکترها
        shuffle($password);
            return implode('',$password);
    }

    public function render()
    {
        $admins = Admin::query()->with('roles.permissions')->latest()->get();
        return view('livewire.admin.admin-user.index', [
            'admins' => $admins
        ])->layout('layouts.admin.app');
    }
}
