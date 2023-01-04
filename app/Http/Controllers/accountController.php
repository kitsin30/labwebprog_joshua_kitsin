<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class accountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function authCheck(){
        if(!Auth::check()){
            return redirect('/login');
        }

        return redirect('home');
    }

    public function index()
    {
        return view('register');
    }

    public function loginAction(Request $request){
        $data = [
            'email' => $request->emailInput,
            'password' => $request->passwordInput
        ];

        if(!Auth::attempt($data, true)){
            return redirect()->back()->withErrors([
                'email' => 'wrong email or password'
            ]);
        };

        return redirect('home');
    }

    public function logout(){
        Auth::logout();
        return redirect('/');
    }

    public function profileView(){
        return view('profile');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:5',
            'email' => 'required|ends_with:@mail.com|unique:users,email',
            'password' => 'required|alpha_num|min:8|required_with:confirmPassword|same:confirmPassword',
            'gender' => 'required',
            'date' => 'required|before:today|after:1900-01-01',
            'country' => 'required'
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->role = "customer";
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->gender = $request->gender;
        $user->dateOfBirth = $request->date;
        $user->country = $request->country;
        $user->save();
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        return view('profile');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
