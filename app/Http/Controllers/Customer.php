<?php

namespace App\Http\Controllers;

use App\Banner_model;
use App\Mail\SendTokenMail;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Validator;
use App\Users;
use Mail;
use App\Mail\SendMail;
use Redirect;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\CheckValidate;
use App\User;
use App\PasswordReset;

class Customer extends Controller
{
    //
    protected $users, $banner_model, $reset_Pass;

    public function __construct()
    {
        $this->users = new Users();
        $this->banner_model = new Banner_model();
        $this->reset_Pass = new PasswordReset();
    }

    public function index(Request $request)
    {
        $banner = $this->banner_model->getInfo();
        return view('customer.home', ['banner' => $banner]);
    }

    public function login(Request $request)
    {
        //Lấy ra thông tin trong form đăng nhập trừ _token (username,password)
        $data = $request->except('_token');
        // Sử dụng thư viện Auth của laravel để kiểm tra username password trong database
        if (Auth::attempt($data)) {  //Trả về true hoặc false
            $data = Auth::user();//Nếu true lấy ra thông tin user
            if ($data->active == 1) {//Kiểm tra user có active nếu active = 1 redirec về trang chủ
//                session flash duy nhta trong 1 route, load lai trang thi mat
                $request->session()->flash('login', 'Đăng nhập thành công');
                return redirect('/');
            } else {
                //User chưa active trả về lỗi
                Auth::logout();
                $request->session()->flash('fail', 'Đăng nhập thất bại');
                return redirect('/');
            }
        } else {
//            Auth::logout();
            $request->session()->flash('fail', 'Đăng nhập thất bại');
            return redirect('/');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function signup(Request $res)
    {
        $validator = Validator::make($res->all(), [
            'email' => 'unique:users',
            'last_name' => 'required',
            'first_name' => 'required',
        ],
            [
                'unique' => ':attribute đã tồn tại',
//                'require' => ':attribute d',
            ]);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()->all()]);
        }
        $this->users->name = $res->input('last_name') . ' ' . $res->input('first_name');
        $this->users->email = $res->input('email');
        $this->users->password = bcrypt($res->input('password'));
        $this->users->active = '0';
        $this->users->role = 'user';
        $message = array(
            'name' => $res->input('last_name') . ' ' . $res->input('first_name'),
            'link' => $res->root() . '/customer/update/' . $res->input('email'),
            'email' => $res->input('email'),
        );

        if ($this->users->save()) {
            Mail::to($res->input('email'))->send(new SendMail('Xác nhận thông tin địa chỉ email tại Gemingear.vn', $message));
            return response()->json(['success' => 'Đăng ký thành công vui lòng kiểm tra email của bạn']);
        } else {
            return response()->json(['success' => 'Đăng ký thất bại! Xin kiểm tra lại']);
        }
    }


//
    public function sendMailForgotPass(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        $message = array(
            'token' => $passwordReset->token,
            'email' => $request->input('email'),
        );
        if ($passwordReset) {
//            $user->notify(new Customer($passwordReset->token));
            Mail::to($request->input('email'))->send(new SendTokenMail('Xác nhận thông tin địa chỉ email tại Gemingear.vn', $message));
            return response()->json(['success' => 'Đăng ký thành công vui lòng kiểm tra email của bạn']);

        }
        return response()->json([
            'message' => 'We have e-mailed your password reset link!'
        ]);

    }

    public function reset(Request $request)
    {
        $token = $request->token;
        $passwordReset = PasswordReset::where('token', $token)->first();
        if($passwordReset==null){
            $request->session()->flash('wrong', 'Mã token sai');
            return redirect('/');
        }

        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $newPassword = Hash::make($request->password);
        $updatePasswordUser = $user->update(['password' => $newPassword]);
        $passwordReset->delete();

        return redirect('/');
    }

    public function update($email)
    {
        $where = array('email' => $email);
        if ($this->users->updateInfo($where, array('active' => 1))) {
            return redirect::to('http://127.0.0.1:8000/');
        } else {
            return redirect()->back();
        }
    }


}
