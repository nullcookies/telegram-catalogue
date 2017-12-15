<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],
        [
            'email.required' => 'Email обязательно к заполнению.',
            'email.email' => 'Не верный формат Email.',
            'email.max' => 'Очень длинный Email.',
            'email.unique' => 'Пользователь с таким Email уже зарегистрирован.',
            'password.required' => 'Нужно указать пароль.',
            'password.min' => 'Минимальная длинна пароля - 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function register(Request $request)
    {
        //print_r($request->all());die;
        $data = $request->only('email', 'password');

        $this->validate($request,[
        'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],
        [
            'email.required' => 'Email обязательно к заполнению.',
            'email.email' => 'Не верный формат Email.',
            'email.max' => 'Очень длинный Email.',
            'email.unique' => 'Пользователь с таким Email уже зарегистрирован.',
            'password.required' => 'Нужно указать пароль.',
            'password.min' => 'Минимальная длинна пароля - 6 символов.',
            'password.confirmed' => 'Пароли не совпадают.'
        ]);

        $user = $this->create($data);

        if ($user != null) {
            return response()->json(['success' => true, 'reload' => true]);
        }

        return response()->json(['success' => false]);
    }
}
