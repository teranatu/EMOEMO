<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Socialite;
use App\User;
use Auth;
use Illuminate\Support\Facades\Storage;


class AuthController extends Controller
{
    public function login()
    {
        return Socialite::with('Twitter')->redirect();
    }

    public function callback()
    {
        // ユーザ属性を取得
        try {
            $userSocial = Socialite::driver('twitter')->user();
            $token = $userSocial->token;
            $tokenSecret = $userSocial->tokenSecret;
            dd($userSocial);
        } catch (Exception $e) {
            // OAuthによるユーザー情報取得失敗
            return redirect()->route('/')->withErrors('ユーザー情報の取得に失敗しました。');
        }
        //トークンで登録状況を調べる
        $user = User::where(['token' => $token])->where(['tokenSecret
        ' => $tokenSecret])->first();
        
        //トークンの有無で条件分岐
        if($user){
            //トークンがある場合の処理
            
            //ログインしてトップページにリダイレクト
            Auth::login($user);
            return redirect('/memos');
        }else{
            //メールアドレスがなければユーザ登録
            $newuser = new User;
            $newuser->name = $userSocial->getName();
            $newuser->email = $userSocial->getEmail();
            $newuser->twitter_id = $userSocial->getNickname();
            $newuser->avatar = $userSocial->getAvatar();
            
            $newuser->token = $token;
            $newuser->tokenSecret = $tokenSecret;
            //ユーザ作成     
            $newuser->save();
            //ログインしてトップページにリダイレクト
            Auth::login($newuser);
            return redirect('memos');
        }


    }
}