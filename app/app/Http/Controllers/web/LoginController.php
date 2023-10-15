<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginPostRequest;
use App\Models\Companies;
use App\Models\Users;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
                $user_email = $request->userEmail;
                $user_password = $request->userPassword;

                $user_exists = Users::where('email', $user_email)
                ->where('role', Users::STATUS_ACTIVE)->exists();

                if ($user_exists) {
                    // $user_details = DB::table('users')
                    //     ->select('id as user_id', 'company_id', 'fname as user_fname',
                    //         'lname as user_lname', 'email as user_email', 'password', 'role as user_role')
                    //     ->where('email', '=', $username)
                    //     ->where('role', Users::ADMIN_ROLE)
                    //     ->first();

                    $user_details = Users::select('id as user_id', 'company_id', 'fname as user_fname',
                            'lname as user_lname', 'email as user_email', 'password', 'role as user_role', 'salt')
                    ->where('email', $user_email)
                    ->where('role', Users::STATUS_ACTIVE)->first();

                    if (empty($user_details)) {
                        return back()->withError('Unknown username');
                    }
                    else {
                        $salt = $user_details->salt;
                        $pepper = env('PASSWORD_PEPPER');
                        $salted_peppered_password = $salt.$user_password.$pepper;

                        if (Hash::check($salted_peppered_password, $user_details->password)) {
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
