@extends('layouts/master')

@section('content')
	<h1>{{$question->user->email}} askes:</h1>
	<p>
		{{e($question->question)}}
	</p>

	<div class="answers">
		<h2>Answers</h2>

		@if(!$question->answers)
			<p>This Question has not been answered yet.</p>
		@else
			<ul>
				@foreach($question->answers as $answer)
				<li>{{e($answer->answer)}} - by {{$answer->user->email}}</li>
				@endforeach
			</ul>
		@endif
	</div>


	<div class="post-answer">
		<h2>Answer This Question</h2>
		@if(!Auth::check())
			<p>Please login to answer the question</p>
		@else
			<div class="well">
              {{Form::open(array('route'=>'answers.store','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Give an Answer</legend>
                  <div class="form-group">
                    {{Form::label('answer', "Answer", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('answer',NULL,$attributes = array('class'=>'form-control','placeholder'=>"Type your answer"))}}
						
						{{$errors->first('answer')}}


                    </div>
                  </div>
					




           		{{Form::hidden('question_id',$question->id)}}
                  


                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Post Answer', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>
		@endif
	</div>
@stop