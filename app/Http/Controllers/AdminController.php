<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Order;
use App\Models\Users;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Laravel\Socialite\Facades\Socialite;

class AdminController extends Controller
{

    
    public function index(Request $request)
    {
        if ($request->input()) {

            $request->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            $login = Admin::where(['username' => $request->username])->pluck('password')->first();

            if (empty($login)) {
                return response()->json(['username' => 'Username Does not Exists.']);
            } else {
                if (Hash::check($request->password, $login)) {
                    $admin = Admin::first();
                    $request->session()->put('admin', '1');
                    $request->session()->put('admin_name', $admin->admin_name);
                    return '1';
                } else {
                    return response()->json(['password' => 'Username and Password does not matched.']);
                }
            }
        } else {
            return view('admin.admin');
        }
    }

    public function dashboard()
    {
        $data['products'] = Product::count();
        $data['users'] = Users::count();
        $date = date('Y-m-d');
        $data['today_orders'] = Order::whereDate('created_at', $date)->count() ?? 0;
        return view('admin.dashboard', $data);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        session()->forget('admin');
        session()->forget('admin_name');
        return '1';
    }
}
