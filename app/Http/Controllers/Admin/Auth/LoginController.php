<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\AdminRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/admin';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login()
    {

        if (Auth::check() == true) {
            return redirect()->route('admin.dashboard.index');
        }

        return view('admin.auth.login');
    }

    /**
     * Validate the user login request.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function validateLogin(Request $request)
    {
        $request->validate([
            $this->username() => 'required|string',
            'password' => 'required|string',
        ]);
    }

    public function postlogin(Request $request)
    {
        $data = [
            'email' => $request->get('email'),
            'password' => $request->get('password'),
        ];

        if (Auth::attempt($data)) {
            $request->session()->put('ckfinder', true);
            return response()->json(
                [
                    'type' =>  'success',
                    'notice' => 'Đăng nhập thành công'
                ]
            );
        }

        return response()->json(
            [
                'type' =>  'error',
                'notice' => 'Thông tin tài khoản không chính xác'
            ]
        );
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        return redirect()->route('admin.auth.login');
    }

    public function indexAccount()
    {
        return view('admin.dashboard.account');
    }

    public function updateAccount(Request $request)
    {
        $data = $request->all();

        $admin = User::find(1);

        if ((bool) $admin == false) {
            return response()->json(
                ['message' => 'Không tồn tại tài khoản'],
                400
            );
        }

        if (!Hash::check($data['password'], $admin['password'])) {
            return response()->json(
                ['message' => 'Mật khẩu cũ không đúng'],
                400
            );
        }

        $data['password'] = Hash::make($data['password']);

        $result = $admin->update($data);

        if ($result == true) {
            $this->logout($request);

            return response()->json(
                'Thao tác thành công',
                200
            );
        }

        return response()->json(
            'Lỗi máy chủ',
            500
        );
    }
}
