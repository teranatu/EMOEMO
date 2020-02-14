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
        } catch (Exception $e) {
            // OAuthによるユーザー情報取得失敗
            return redirect()->route('/')->withErrors('ユーザー情報の取得に失敗しました。');
        }
        //メールアドレスで登録状況を調べる
        $user = User::where(['email' => $userSocial->getEmail()])->first();

        //メールアドレス登録の有無で条件分岐
        if($user){
            //email登録がある場合の処理
            //twitter id　が変更されている場合、DBアップデード
            if($user->twitter_id  !== $userSocial->getNickname()){
                $user->twitter_id = $userSocial->getNickname();
                $user->save();
            }
            
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