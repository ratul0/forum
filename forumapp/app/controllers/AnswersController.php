<?php 
class AnswersController extends BaseController{


	function __construct()
	{
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('store')));
   		
	}

	public function store(){
		$validation = Answer::validate(Input::all());

		$question_id = Input::get('question_id');

		if($validation->passes()){
			Answer::create(['answer'=>Input::get('answer'),
				'user_id'=>Auth::user()->id,
				'question_id'=>$question_id]);

			return Redirect::route('questions.show', $question_id)
			->with('message','Your answer has been posted!');
		}else{
			return Redirect::back()->withInput()->withErrors($validation);
		}


	}
}