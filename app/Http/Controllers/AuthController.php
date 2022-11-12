<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function LoginAuth(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
          return redirect()->intended('dashboard');
        }
  
        return redirect("/")->with('fail','Login details are not valid');
    }
    public function Registeration()
    {
        return view('auth.register');
    }
    public function UserRegistration(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'surname' => 'required',
            'address' => 'required',
            'Gender'=> 'required',
            'mobile_number' => 'required|max:11',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        $data = $request->all();
        $check = $this->create($data);
         
        return redirect("dashboard")->withSuccess('You have signed-in');
    }
    public function create(array $data)
    { 
      return User::create([
        'name' => $data['name'],
        'surname' => $data['surname'],
        'address' => $data['address'],
        'mobile_number' => $data['mobile_number'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'Gender' => $data['Gender'],
        'user'=> 'User'
      ]);
    }
    public function ProfileUpdate(Request $request)
    {
      $request->validate([
        'name' => 'required',
        'surname' => 'required',
        'address' => 'required',
        'Gender'=> 'required',
        'mobile_number' => 'required|max:11'
        ]);
        User::where('email', '=', $request->email)->update([
          'name' => $request->name,
          'surname' => $request->surname,
          'address' => $request->address,
          'mobile_number' => $request->mobile_number,
          'Gender' => $request->Gender
    ]);
    
        return redirect()->route('user.profile.edit')
                        ->with('success','User updated successfully');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}
