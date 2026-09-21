<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ], [
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスの形式で入力してください',
            'password.required' => 'パスワードを入力してください',
            'password.string' => 'パスワードは文字列で入力してください',
        ]);

        // 認証処理を実装するまでの仮の戻り先
        return redirect('/login');
    }
}