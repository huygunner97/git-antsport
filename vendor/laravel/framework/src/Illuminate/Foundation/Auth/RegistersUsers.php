<?php

namespace Illuminate\Foundation\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Registered;
use App\Mail\SendMailVerify;
use Illuminate\Support\Facades\Mail;

trait RegistersUsers
{
    use RedirectsUsers;

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
        return view('client.auth.register');
    }

    public function showVerify()
    {
        return view('client.auth.verify');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($this->create($request->all())));

        $user = User::all()->last()->id;
        // $this->guard()->login($user);
        $data = [
            'id' => $user,
            'user' => $request->email,
            'pass' => $request->password
        ];
        Mail::to($request->email)
            ->send(new SendMailVerify($data));

        return redirect('email/verify');
    }

    public function registerSuccess($id, $user, $pass)
    {
        User::where('id', $id)->update([
            'email' => $user,
        ]);
        return redirect($this->redirectPath())->with('user', $user)->with('pass', $pass);
    }


    /**
     * Get the guard to be used during registration.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard();
    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    public function registered(Request $request, $user)
    {
        //
    }
}
