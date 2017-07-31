<?php

class AuthController extends \BaseController {


    public function getLogin()
    {
        if (\Auth::check()) {
            return \Redirect::route('getHome');
        }

        return \View::make('auth.index');
    }


    public function getLogout()
    {
        \Auth::logout();
        \Session::flush();
        \Session::flash('success', 'Successfully logged out');

        return \Redirect::route('getHome');
    }


    public function postLogin()
    {
        $errorMessages = [];
        try {
            $validator = new UserLoginFormValidator();
            $result = $validator->validate(\Input::all());
            if ($result->fails()) {
                \Session::flash('error', $result->messages()->all());
                return \Redirect::route('getLogin')->withInput(\Input::except('password'));
            }


            $email = \Input::get('email');
            $password = \Input::get('password');
            $remember = false;
            if (\Input::has('remember')) $remember = true;

            // try with standard Laravel attempt
            $attempt = \Auth::attempt([
                'email' => $email,
                'password' => $password
            ], $remember);

            if (!$attempt) {
                throw new \Exception(sprintf('Login attempt failed: %s', Input::get('email')));
            }
        } catch (\Exception $e) {
            \Log::warning($e->getMessage());
            \Session::flash('error', $errorMessages);
            return \Redirect::route('getLogin')->withInput(\Input::except('password'));
        }

        \Session::flash('success', Lang::get('auth.success_login'));

        return \Redirect::route('getHome');
    }


}
