<?php

namespace App\Http\Controllers;

use App\Mail\SignUp;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    /////////////////////////.......Login......Section..../////////////////
    public function login()
    {
        return view('login');
    }

    public function create(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required|min:7',

        ]);

        try {
            $remember = $request['remember'];
            if (Auth::attempt(['username' => $request['email'], 'password' => $request['password']], $remember)) {

                Session::flash('success', 'Login Successfully');
                return redirect('dashboard');
            } elseif (Auth::attempt(['email' => $request['email'], 'password' => $request['password']], $remember)) {

                Session::flash('success', 'Login Successfully');
                return redirect('dashboard');
            } else {
                Session::flash('error', 'Login Failed');
                return redirect('login');
            }
        } catch (\Exception $e) {
            return $e->getMessage() . "on line" . $e->getLine();

        }
    }

    /////////////////////////.......Regisater Section..../////////////////
    public function register()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required|confirmed|min:7',
        ]);

        $user_data = [
            'first_name' => $request['first_name'],
            'last_name' => $request['last_name'],
            'username' => $request['username'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'user_type' =>2,
        ];
        $user = User::create($user_data);
        Auth::login($user);
        Session::flash('success','Registration  Successfully');
        return redirect('admin/dashboard');
    }
/////////////////////////.......Forget Section..../////////////////
    public function forgetPassword()
    {
        return view('forgetPassword');
    }
    public function forget(Request $request){

        $request->validate([
            'email' => 'required|exists:Users,email',
        ]);

        $user_data = [
            'email' => $request['email'],
        ];
        $user_mail= User::whereEmail($request->email)->first();
        if($user_mail) {
            $code = rand(1001, 99999);
            User::whereEmail($user_mail->email)->update(['code'=> $code]);
            Mail::to($user_mail->email)->send(new SignUp($code));
            Session::flash('success','OTP send on email Successfully');
            return redirect('reset_password')->with($code);
        }else{
            Session::flash('error','OTP send Failed');
            return redirect('forget_password');
        }
    }
    /////////////////////////.......Reset Password Section..../////////////////
        public function resetPassword(){
         return view('ResetPassword');
        }
        public function postReset(Request $request){

            $request->validate([
                'code' => 'required|exists:Users,code',
                'password'=> 'required|confirmed|min:7',
            ]);
            $reset_data=[
                'code' => $request['code'],
                'password' => $request['password']
            ];
            $user= User::whereCode($request['code'])->first();
            if($request['code']){
                $code=rand(1001,99999);
                User::whereCode($request['code'])->update(['password'=>\Hash::make($request['password']),'code'=>$code]);
                Session::flash('success','Reset Password successfully');
                return redirect('login');
            }else{
                Session::flash('success','Reset Password successfully');
                return redirect('login');
            }
        }
    /////////////////////////.......log Out Function Section..../////////////////

    public function logout(Request $request)
    {
        Auth::logout();
        Session::flash('success','Logout Successfully');
        return redirect('login');
    }
    /////////////////////////....... Dashboard Auth Function Section..../////////////////
    public function index()
    {
        return view('layouts.Admin.dashboard');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }
}
