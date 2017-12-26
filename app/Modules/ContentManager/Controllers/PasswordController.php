<?php

namespace App\Modules\ContentManager\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;

class PasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    protected $linkRequestView = 'auth.passwords.email';
    protected $resetView ='auth.passwords.reset';

    /**
     * Create a new password controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('admin');
        $this->linkRequestView = 'ContentManager::.'.$this->linkRequestView;
        $this->resetView = 'ContentManager::.'.$this->resetView;
    }

    public function getResetSuccessResponse($response)
    {
        Session::flash('message', 'Forgot password successfully!');
        Session::flash('alert-class', 'alert-success');
        return redirect('admin');
    }

    public function changePassword(Request $request) {
        $input = $request->all();

        $user = User::find($input['userid']);

        if (Hash::check($input['passwordold'], $user['password']) && $input['passwordnew']== $input['passwordconfirm']) {
            $user->password = bcrypt($input['passwordnew']);
            $user->save();
            return array('status' => 1, 'message'=> "success");
        } elseif ($input['passwordold'] != $user['password']) {
            return array(
                'status' => 0,
                'message'=> "change fail",
                'passwordold' => 'Old password wrong',
            );
        } elseif ($input['passwordnew'] != $input['passwordconfirm']) {
            return array(
                'status' => 2,
                'message'=> "change fail",
                'passwordnew' => 'Please enter the same password as above',
            );
        }
    }
}
