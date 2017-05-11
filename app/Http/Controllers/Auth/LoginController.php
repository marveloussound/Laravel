<?php

namespace App\Http\Controllers\Auth {


    use App\Http\Controllers\Controller;
    use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use \App\Http\ViewModel as ViewModel;

    class LoginController extends Controller {

        //public  $ViewModel = new App\Http\ViewModel\Auth\LoginModel;

        /*
          |--------------------------------------------------------------------------
          | Login Controller
          |--------------------------------------------------------------------------
          |
          | This controller handles authenticating users for the application and
          | redirecting them to your home screen. The controller uses a trait
          | to conveniently provide its functionality to your applications.
          |
         */

        use AuthenticatesUsers;

        /**
         * Where to redirect users after login.
         *
         * @var string
         */
        protected $redirectTo = '/home';

        /**
         * Create a new controller instance.
         *
         * @return void
         */
        public function __construct() {

            //   LoginModel::getInstance();
//            $loginModel = ViewModel\Auth\LoginModel::getInstance();
//            $a = $loginModel->Name;
            $this->test("aa", "a");

            phpinfo();

            $this->middleware('guest', ['except' => 'logout']);
        }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Http\Response
         */
        public function getLogin() {

            return view('home');
        }

        public function test($aaa, $bbb) {

            return true;
        }

    }

}
