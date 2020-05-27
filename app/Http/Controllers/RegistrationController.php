<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Register;

class RegistrationController extends Controller
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
            'firstname' => 'required',
            'surname' => 'required',
            'middlename' => 'required',
            'age' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'confirm_password' => 'required',
            'profile_picture' => 'required|file',
        ]);

        $register = new Register();

        sleep(2);
        if($register->checkEmailIfExists($validated_data['email'])->fetch() != false) {
            return view('pages.registration_page',[
                'title' => 'Registration',
                'data' => $validated_data,
                'email_error_msg' => 'Email already exists.',
            ]);
        } else {
            if (($validated_data['password'] == $validated_data['confirm_password']) != true) {
                return view('pages.registration_page',[
                    'title' => 'Registration',
                    'data' => $validated_data,
                    'password_error_msg' => 'Password does not match.',
                ]);
            } else {
                if($register->details($validated_data)) {
                    return redirect()->route('login_page');
                }
            }
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
