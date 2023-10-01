<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;

class SignupController extends Controller
{
    public function index()
    {
        if (Session::get('loginValidated') === 'yes') {
            return redirect('/dashboard');
        }
        else {
            echo view('header.header_login');
            echo view('signup.signup');
            echo view('footer.footer_login');
        }
    }

    public function save_signup(SignupPostRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {

            $company = new Companies;

            $company->admin_fname    = $request->firstName;
            $company->admin_lname    = $request->lastName;
            $company->comp_name      = $request->compName;
            $company->admin_email    = $request->userEmail;
            $confirmCode             = rand(1000000000,9999999999);
            $confirm_code = md5($confirmCode);
            $company->confirm_code   = $confirm_code;
            $company->created_on     = date('Y-m-d');

            $companyExists = Companies::where('admin_email', '=', $request->userEmail)->count();

            if ($companyExists === 0) {

                $customerCreated = $company->save();

                if ($customerCreated) {
                    $first_name = $request->firstName;
                    $to_name = $request->firstName." ".$request->lastName;
                    $to_email = $request->userEmail;
                    $from_name =  'DaySupport';
                    $from_email = 'noreply@email.daysupport.co.uk';
                    $subject = 'Thank you for signing up with DaySupport';
                    $email_body = '<!DOCTYPE html><html><head><title>Thank you for signing up with Less Terrible Helpdesk</title></head><body><p>Dear
                    '.$first_name.'</p><p>Thank you for signing up with Less Terrible Helpdesk. We are grateful to you for allowing us to give
                    us an opportunity to work with you.</p><p>The next step is to confirm and verify your account, before you can start using it.</p>
                    <p>Please click on the following link to confirm your email. If the link does not open or work you can copy and paste the link in your browser.</p>
                    <p><a href="https://console.daysupport.co.uk/signup/confirm/'.$confirm_code.'" target="_blank">https://console.daysupport.co.uk/signup/confirm/'.$confirm_code.'</a>.</p><p>Thanks &amp; regards,<br><a href="https://twitter.com/newmandev1" target="_blank">
                    Leharado</a><br>Creator of Less Terrible Helpdesk</p></body></html>';
                    MailgunEmail::send_email($to_name, $to_email, $from_name, $from_email, $subject, $email_body);
                    return redirect('/signup')->withSuccess('Signup successful, please check your email for next steps');
                }
                else {
                    return redirect('/signup')->withError('Signup unsuccessful, please try again or reach out to us at support@lessterriblehelpdesk.com');
                }
            }
            else {
                return redirect('/signup')->withError('Signup unsuccessful, customer with the same email already exists, please try again or reach out to us at support@lessterriblehelpdesk.com');
            }
        }
        else {
            return redirect('/signup')->withError('Signup unsuccessful, please fill all required fields and try again');
        }
    }


    public function confirm_signup($confirmCode)
    {
        $companyDetails = DB::table('companies')
            ->select('comp_name as user_comp', 'admin_fname as user_fname', 'admin_lname as user_lname', 'admin_email as user_email', 'confirm_code')
            ->where('confirm_code', '=', $confirmCode)
            ->first();
        if(empty($companyDetails)) {
            return redirect('/signup')->withError('Confirmation code was invalid. Please double check and try again');
        }

        echo view('header.header_login');
        echo view('signup.confirm_signup', ['companyDetails' => $companyDetails]);
        echo view('footer.footer_login');
    }


    public function confirm_signup_save(ConfirmSignupPostRequest $request)
    {
        $validated = $request->validated();

        if ($validated) {
            $userExists = Users::where('email', '=', $request->userEmail)->count();
            if ($userExists > 0) {
                return redirect('/signup')->withError('Signup confirmation unsuccessful, user already exists');
            }
            else {
                $confirmCode = $request->confirmCode;
                $companyDetails = DB::table('companies')
                ->select('id as company_id')
                ->where('confirm_code', '=', $confirmCode)
                ->first();

                $companyId = $companyDetails->company_id;

                $hashedPassword = Hash::make($request->userPassword);

                $user = new Users;

                $user->company_id = $companyId;
                $user->fname      = $request->userfirstName;
                $user->lname      = $request->userlastName;
                $user->email      = $request->userEmail;
                $user->password   = $hashedPassword;
                $user->created_on = date('Y-m-d');
                $user->role       = 'admin';

                $userCreated = $user->save();

                if ($userCreated) {
                    /*
                    Remove confirm_code
                    */
                    $updateCompany = DB::table('companies')->where('id', $companyId)
                       ->update(
                            [
                                'confirm_code' => '',
                                'status' => Companies::STATUS_ACTIVE
                            ],
                    );

                    /*
                    Create default settings
                    */
                    $timezone_settings_data = array(
                        'company_id' => $companyId,
                        'key' => 'timezone',
                        'value' => 'Asia/Kolkata'
                    );
                    DB::table('settings')->insert($timezone_settings_data);

                    $new_sync_log_data = array(
                        'company_id' => $companyId,
                        'last_run' => '1984-06-22 16:27:50'
                    );
                    DB::table('crm_sync_log')->insert($new_sync_log_data);

                    if ($updateCompany) {
                        $first_name = $request->userfirstName;
                        $to_name = $request->userfirstName." ".$request->userlastName;
                        $to_email = $request->userEmail;
                        $from_name =  'DaySupport';
                        $from_email = 'noreply@daysupport.co.uk';
                        $subject = 'Thank you for signing up with DaySupport';
                        $email_body = '<!DOCTYPE html><html><head><title>Thank you for signing up with DaySupport</title></head>
                        <body><p>Dear '.$first_name.'</p><p>Thank you for successfully signing up with DaySupport.
                        We are grateful to you for allowing us to give us an opportunity to work with you.</p>
                        <p>In case you need any help please feel free to tweet me at <a href="https://twitter.com/newmandev1" target="_blank">Leharado</a>.</p>
                            <p>Looking forward to working with you.</p><p>Thanks &amp; regards,<br><a href="https://twitter.com/newmandev1" target="_blank">Leharado</a>
                                <br>Creator of DaySupport</p></body></html>';
                        MailgunEmail::send_email($to_name, $to_email, $from_name, $from_email, $subject, $email_body);
                        return redirect('/signup')->withSuccess('Signup successfully confirmed, you can now login into your account');
                    }
                    else {
                        return redirect('/signup')->withError('Signup confirmation unsuccessful, please reach out to us at support@geedesk.com');
                    }

                }
                else {
                    return redirect('/signup')->withError('Signup unsuccessful, customer with the same email already exists, please try again or reach out to us at support@geedesk.com');
                }
            }
        }
        else {
            //Not working
            return redirect()->back()->withError('Signup unsuccessful, please fill all required fields and try again');
        }
    }
}
