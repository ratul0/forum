<?php 
class UsersController extends BaseController{


	function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
   		
	}

	public function create()
	{
		return View::make('users.new')->with('title','Get Answer - Register');
	}


	public function store()
	{
		/*$input = Input::all();
		$validation = Validator::make($input,
		 ['email'=>'required|unique:users|email',
		 'password'=>'required|confirmed',
		'password_confirmation'=>'required']);

		if($validation->passes()){
			User::create($input);

			return Redirect::route('home')->with('message','Thanks For Registering!');
		}else{
			return Redirect::back()->withInput()->withErrors($validation);
		}*/

		/*$user = new User(Input::all());

		if($user->save()){
			return Redirect::route('home')->with('message','Thanks For Registering!');
		}

		return Redirect::back()->withInput()->withErrors($user->errors);*/


		$validation = User::validate(Input::all());

		if($validation->passes()){

			$user = ['email'=>Input::get('email'),'password'=>Hash::make(Input::get('password'))];

			User::create($user);

			return Redirect::route('home')->with('message','Thanks For Registering!');
			
		}

		return Redirect::back()->withInput()->withErrors($validation);


	}


	public function getLogin()
	{
		return View::make('users.login')->with('title','Get Answer - Login');
	}

	public function postLogin()
	{


		$user = ['email'=>Input::get('email'),'password'=>Input::get("password")];


		if(Auth::attempt($user)){
			return Redirect::route('home')->with('message','You are Logged In !!');

		}else{
			return Redirect::back()->with('message','your username/password was invalid')->withInput();
		}
	}

	public function getLogout()
	{
		if(Auth::check()){
			Auth::logout();
			return Redirect::route('login')->with('message','You are now logged out!');
		}else{
			return Redirect::route('home');
		}
	}




}
