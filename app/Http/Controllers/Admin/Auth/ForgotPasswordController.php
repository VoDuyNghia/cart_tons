<?php

namespace App\Http\Controllers\Admin\Auth;

use App\User;
use App\Jobs\SendEmail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Mail\ForgotPasswordAdmin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    public function forgot(Request $request)
    {
        return view('admin.auth.forgot');
    }

    /**
     * Get the needed authentication credentials from the request.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    protected function credentials(Request $request)
    {
        return $request->only('email');
    }

    public function postForgot(Request $request)
    {
        $user = $this->broker()->getUser($this->credentials($request));

        if ($user != null) {
            $data['email'] = $request->get('email');
            $data['new_password'] = Str::random(6);

            $result = User::where('email', $data['email'])->update(['password' => Hash::make($data['new_password'])]);

            if ((bool) $result == true) {
                SendEmail::dispatch(new ForgotPasswordAdmin($data), $data['email']);
            }

            return response()->json(
                [
                    'type' =>  'success',
                    'notice' => 'Vui lòng đăng nhập vào Email để nhận mật khẩu mới !'
                ]
            );
        } else {
            return response()->json(
                [
                    'type' =>  'error',
                    'notice' => 'Email không chính xác !'
                ]
            );
        }
    }
}
