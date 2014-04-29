<?php 


class BaseModel extends Eloquent {
/*	public $errors;


	public static function boot()
	{
		parent::boot();

		static::saving(function($data){
			return $data->validate();

		});
	}


	public function validate()
	{

		$validation = Validator::make($this->attributes, static::$rules);

		if($validation->passes()) return true;

		$this->errors = $validation->messages();
		return false;
		
	}*/
		public static function validate($data)
		{
			return Validator::make($data, static::$rules);
		}


	

}

