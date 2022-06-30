<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Referral_link;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;

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
    protected $redirectTo = RouteServiceProvider::HOME;

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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed',"regex:([a-zA-Z])"],
            'image'=>["required",'image','mimes:jpg,png,jpeg,gif,svg','max:5000'],
            "phone_number"=>['required','unique:users']
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data )
    {


         $user= User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
             'image'=>$data['image'],
             'referred_by' => $data['referred_by'],
             'birth_date'=>$data['birth_date'],
             'phone_number'=>$data['phone_number'],
        ]);
        if(request()->hasFile('image')) {
            $avatar = request()->file('image')->getClientOriginalName();
            request()->file('image')->move('avatars', $user->id . '/' . $avatar, '');
            $user->update(['image' => $avatar]);
        }
        Referral_link::create([
            "user_id"=>$user->id,
            "link"=>URL::current()."?id=$user->id"
        ]);


           return $user ;

    }
}
