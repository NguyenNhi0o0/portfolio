<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;



class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.login');
    }
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required'],
            'password' => ['required'],
        ]);

        // $login = Admin::find(1);

        // if ($credentials['name'] == $login->name && $credentials['password'] == $login->password){
        //     return redirect('\admin');
        // }

        // Giả sử bạn tìm người dùng theo tên. Bạn cần đảm bảo tên là duy nhất.
        $admin = Admin::where('name', $credentials['name'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
           
            Auth::login($admin);  
            return redirect('/admin');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }
}
