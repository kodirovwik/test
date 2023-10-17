<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index(Request $request)
    {
        if (auth()->check()) {
            return redirect(route('download_index'));
        }

        return view('auth');
    }

    public function login(Request $request)
    {
        $validated = $this->validateRequest($request);

        $credits = [
            'name' => $validated['username'],
            'password' => $validated['password']
        ];

        if (auth()->attempt($credits)) {
            return redirect()->route('download_index');
        }

        return redirect()->back()->withErrors(['login_error' => 'Неверные данные']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect('/');
    }

    public function createDefaultUser()
    {
        $userExists = User::query()
            ->where('name', 'admin')
            ->exists();

        if ($userExists) {
            return redirect()->back()->withErrors(['result' => 'Дефолтный пользователь уже существует. Имя пользователя: admin, Пароль: admin']);
        }

        $user = new User();

        $user->name = 'admin';
        $user->email = 'admin@admin.ru';
        $user->password = Hash::make('admin');

        $user->save();

        return redirect()->back()->withErrors(['result' => 'Дефолтный пользователь создан. Имя пользователя: admin, Пароль: admin']);
    }

    private function validateRequest(Request $request): array
    {
        return $this->validate(
            $request,
            [
                'username' => 'required|string',
                'password' => 'required|string',
            ],
            [
                'username.required' => 'Имя пользователя обязательно для заполнения',
                'password.required' => 'Пароль обязателен для заполнения',
                'username.string' => 'Имя пользователя должно быть строкой',
                'password.string' => 'Пароль должен быть строкой',
            ]
        );
    }
}
