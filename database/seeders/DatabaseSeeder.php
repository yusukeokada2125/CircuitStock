<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $userName = config('initial_user.user_name');
        $email = config('initial_user.email');
        $password = config('initial_user.password');

        if (!is_string($userName) || trim($userName) === '') {
            throw new \RuntimeException('INITIAL_USER_NAMEを設定してください。');
        }
        
        if (!is_string($email) || trim($email) === ''){
            throw new \RuntimeException('INITIAL_USER_EMAILを設定してください。');
        }
            
        if (!is_string($password) || trim($password) === ''){
            throw new \RuntimeException('INITIAL_USER_PASSWORDを設定してください。');
        }

        if (mb_strlen($userName, 'UTF-8') > 32 ) {
            throw new \RuntimeException('INITIAL_USER_NAMEは32文字以内で設定してください。');
        }

        if (mb_strlen($email, 'UTF-8') > 255 ) {
            throw new \RuntimeException('INITIAL_USER_EMAILは255文字以内で設定してください。');
        }

        if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            throw new \RuntimeException('INITIAL_USER_EMAILを正しいメールアドレスの形式で設定してください。');
        }

        if (mb_strlen($password, 'UTF-8') < 15 || mb_strlen($password, 'UTF-8') > 64 ) {
            throw new \RuntimeException('INITIAL_USER_PASSWORDは15~64文字以内で設定してください。');
        }

        User::firstOrCreate(
            ['email' => $email],
            [
                'user_name' => $userName,
                'password' => $password,
            ]
        );
    }
}
