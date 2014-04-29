<?php 


class Question extends Basemodel{

	public $timestamps = false;

	protected $guarded = [];

	public static $rules = [
		'question'=>'required|min:10|max:1000',
		'solved'=>'in:0,1'
	];

	public function user()
	{
		return $this->belongsTo('User');
	}


	public function answers(){
		return $this->hasMany('Answer');
	}

	public static function unsolved()
	{
		return static::where('solved','=',0)->orderBy('id','DESC')->paginate(3);
	}
	public static function yourQuestions()
	{
		return static::where('user_id','=',Auth::user()->id)->paginate(3);
	}
}
