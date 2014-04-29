<?php 
class QuestionsController extends BaseController{


	public function __construct() {
	   $this->beforeFilter('csrf', array('on'=>'post'));
	   $this->beforeFilter('auth', array('only'=>array('store','yourQuestions','edit','update')));
	}

	public function index()
	{
		//dd(Question::unsolved());
		return View::make('questions.index')
			->with('title','Get Answer - Home')
			->with('questions',Question::unsolved());
	}

	public function store()
	{
		$validation = Question::validate(Input::all());

		$question = ['question'=>Input::get('question'),'user_id'=>Auth::user()->id];
		if($validation->passes()){
			Question::create($question);

			return Redirect::route('home')
				->with('message','Your question has been posted!');
		}else{
			return Redirect::route('home')->withErrors($validation)->withInput();
		}
	}


	public function show($id)
	{
		return View::make('questions.view')
			->with('title','Get Answer - View Question')
			->with('question',Question::find($id));
	}

	public function yourQuestions()
	{
		return View::make('questions.userQuestions')
			->with('title','Get Answer - Your Question')
			->with('useremail',Auth::user()->email)
			->with('questions',Question::yourQuestions());
	}


	public function edit($id)
	{
		$question = Question::find($id);
		if(is_null($question) or !$this->questionBelongsToUser($id)){
			return Redirect::route('your_questions')->with('message',"Invalid Question");
		}

		return View::make('questions.edit')
			->with('title','Get Answer - Edit Question')
			->with('question',Question::find($id));
		
	}



	public function questionBelongsToUser($id)
	{
		$question = Question::find($id);

		if($question->user_id == Auth::user()->id){
			return true;
		}

		return false;
	}


	public function update()
	{
		$id = Input::get('question_id');


		if(!$this->questionBelongsToUser($id)){
			return Redirect::route('your_questions')->with('message',"Invalid Question");
		}

		$validation = Question::validate(Input::all());

		$questionUpdate = ['question'=>Input::get('question'),'solved'=>Input::get('solved')];
		
		if($validation->passes()){
			 Question::find($id)->update($questionUpdate);
			//Question::update($id,['question'=>Input::get('question'),'solved'=>Input::get('solved')]);

			return Redirect::route('questions.show',$id)
				->with('message','Your question has been updated!');
		}else{
			return Redirect::route('questions.edit',$id)->withErrors($validation);
		}
	}



}
