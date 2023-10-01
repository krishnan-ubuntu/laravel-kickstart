<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class LoginController extends Controller
{
    public function index()
    {
        if (Session::get('loginValidated') === 'yes') {
            return redirect('/dashboard');
        }
        else {
            echo view('header.header_login');
            echo view('login.login');
            echo view('footer.footer_login');
        }
    }

    public function validate_login(LoginPostRequest $request)
    {
        try {
            $validated = $request->validated();
            $user_details = '';

            if ($validated) {
                $username    = $request->username;
                $password    = $request->password;

                $user_exists = Users::where('email', '=', $username)->where('role', Users::ADMIN_ROLE)->count();

                if ($user_exists > 0) {
                    $user_details = DB::table('users')
                        ->select('id as user_id', 'company_id', 'fname as user_fname',
                            'lname as user_lname', 'email as user_email', 'password', 'role as user_role')
                        ->where('email', '=', $username)
                        ->where('role', Users::ADMIN_ROLE)
                        ->first();

                    if (Hash::check($password, $user_details->password)) {
                        Session::put('userId', $user_details->user_id);
                        Session::put('companyId', $user_details->company_id);
                        Session::put('userFname', $user_details->user_fname);
                        Session::put('userLname', $user_details->user_lname);
                        Session::put('userEmail', $user_details->user_email);
                        Session::put('userRole', $user_details->user_role);
                        Session::put('loginValidated', 'yes');

                        return redirect('/dashboard');
                    }
                    else {
                        return back()->withError('Wrong username/password');
                    }
                }
                else {
                    return back()->withError('Unknown username');
                }
            }
            else {
                //Not working
                return back()->withErrors(['message'=>'Record does not exist']);
            }
        } catch (\Throwable $th) {
            echo 'Message: ' .$th->getMessage();
        }
    }


    public function logout()
    {
        Session::flush();
        return redirect('/login');
    }
}
