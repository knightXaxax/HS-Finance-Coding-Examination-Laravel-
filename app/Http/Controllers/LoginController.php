<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Login;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
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
        $validated_data = request()->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        $login = new Login();

        $status = $login->verify($validated_data);
        sleep(1);

        if($validated_data['email'] != '' && $validated_data['password'] != '') {
            if($status['msg'] == "email_error") {
                return view('pages.login_page', [
                    'title' => 'Login',
                    'email' => $validated_data['email'],
                    'email_error_msg' => 'Email given does not exists.',
                ]);
            } else if($status['msg'] == "password_error") {
                return view('pages.login_page', [
                    'title' => 'Login',
                    'email' => $validated_data['email'],
                    'password_error_msg' => 'Password does not match.',
                ]);
            } else if($status['msg'] == "success") {
                $request->session()->put('profile_id', $status['id']);
                $request->session()->put('fullname', $status['fullname']);
                $request->session()->put('profile_picture_path', $status['profile_picture_path']);
                return redirect()->route('profile', [
                    'profile_id' => $status['id'],
                ]);
            }
        } else {
            return back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
