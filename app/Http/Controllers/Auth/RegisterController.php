<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Company;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;



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
            'password' => ['required', 'string', 'confirmed'],
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
        $role=Role::find(3);
       
        $user = new User;
        $user->name = $data['name'];
        $user->email =$data['email'];
        $user->password = Hash::make($data['password']);
        $user->assignRole($role);
        $user->save();
        return $user;;
    }

    protected function companyRegister(){
        return view('auth.companyregister');
    }
    public function companySave(Request $request)
    {
        $role=Role::find(2);

        $user = new User;
        $user->name = $request->company_name;
        $user->email = $request->email;
        $user->is_admin = "1";
        $user->password = Hash::make($request->password);
        $user->assignRole($role);
        $user->save();
        if(\Auth::attempt(['email' => $request->email, 'password' => $request->password,])){
            $company = new Company;
            $company->user_id = \Auth::user()->id;
            $company->name = $request->company_name;
            $company->save();
            return redirect('/home');

        } 
    }
}
