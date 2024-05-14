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

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        // Retrieve the user information from Google using the authorization code
        $user = Socialite::driver('google')->user();

        // Check if the user exists in your database, if not, create one
        $authenticatedUser = User::firstOrCreate([
            'name' => $user->getName(),
            'email' => $user->getEmail()
        ]);

        Session::put('user', '1');
        Session::put('user_name', $authenticatedUser->name);
        Session::put('user_id', $authenticatedUser->user_id);
        Session::put('user_city', $authenticatedUser->city);
        // Log in the user
        return redirect()->route('user_login');
    }

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
            return view('admin.dashboard');
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
