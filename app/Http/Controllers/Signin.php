<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
class Signin extends Controller
{
//
    //    truyền voà provider là facebook hay google thì nó sẽ redirect về giao diện facebook hay google
    public function redirectToProvider($provider)
    {

        return Socialite::driver($provider)->redirect();
    }

//  nhấn đăng nhập thì vẫn nhận vào nhà cung cấp là gì đó.
    public function handleProviderCallback($provider)
    {
//        dùng thư viện lấy thông tin user
        $user = Socialite::driver($provider)->stateless()->user();
//       tìm trong dtb có thì lấy ra kh có thì tạo mới, tìm user vào provider
        $authUser = $this->findOrCreate($user, $provider);
//         dungf thuw Auth login vao tk
        Auth::login($authUser, true);
//
        session()->flash('login', 'Đăng nhập thành công');
        return redirect('/');
    }
    public function findOrCreate($user, $provider)
    {
//        tim user với cái email mà Facebook hay gg cung câó
        $userUnique = User::where('email', $user->email)->first();
//        tìm tháy thì trả về user dó luon
        if ($userUnique) {
            return $userUnique;
        }
//        nếu kh thif nó sẽ trả về id của Fb hay gg cung cấp, lấy hàng đầu.
        $authUser = User::where('provider_id', $user->id)->first();
// nếu tim thay id provider đã lưu dưới dtb thì trả  về luôn
        if ($authUser) {
            return $authUser;
        }
//         không tìm thấy thì tạo
        return User::create([
            'name' => $user->name,
            'email' => $user->email,
            'provider' => strtoupper($provider),
            'provider_id' => $user->id,
        ]);
    }
}



