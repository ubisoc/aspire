<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Address;
use App\Account;
use App\Http\Controllers\Controller;
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
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'mobile_number' => 'required|numeric',
            'line1' => 'required|max:255',
            'city' => 'required|max:255',
            'country' => 'required|max:255',
            'postcode' => 'required|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        $address = Address::create([
            'line1' => $data['line1'],
            'line2' => $data['line2'],
            'line3' => $data['line3'],
            'city' => $data['city'],
            'country' => $data['country'],
            'postcode' => $data['postcode'],
        ]);

        $user = new User;
        $user->first_name = $data['first_name'];
        $user->last_name = $data['last_name'];
        $user->email = $data['email'];
        $user->password = bcrypt($data['password']);
        $user->mobile_number = $data['mobile_number'];
        $user->address()->save($address);

        $account = new Account;
        $account->setType('C');
        $account->save();
        $account->users()->save($user);

        return $user;
    }
}
