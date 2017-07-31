<?php


class RegisterController extends \BaseController {

    public function getRegister()
    {
        if ( \Auth::check() )
        {
            return \Redirect::route('getHome');
        }
        return \View::make('register.index')->with([
            'first_name' => '',
            'last_name' => '',
            'email' => ''
        ]);
    }


    public function postRegister()
    {
        $validator = new UserRegistrationFormValidator();
        $result = $validator->validate(\Input::all());

        if ($result->fails()) {
            \Session::flash('error', $result->messages()->all());
            return \Redirect::route('getRegister')->withInput(\Input::except('password'));
        }

        $user = User::create([
            'email' => \Input::get('email'),
            'first_name' => \Input::get('first_name'),
            'last_name' => \Input::get('last_name'),
            'password' => Hash::make(Input::get('password'))
        ]);

        // log user in
        \Auth::loginUsingId($user->id);

        return \Redirect::route('getHome');
    }

}
