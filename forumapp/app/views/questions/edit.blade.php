@extends('layouts/master')

@section('content')

<div class="well">
              {{Form::open(array('route'=>'questions.update','method' => 'put','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Edit Your Question</legend>
                  <div class="form-group">
                    {{Form::label('question', "Question", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('question', $question->question,$attributes = array('class'=>'form-control','placeholder'=>"Type your question"))}}
						
						{{$errors->first('question')}}


                    </div>
                  </div>
					
					<div class="form-group">
					<div class="col-lg-2">
	                    {{Form::label('solved', "Solved")}}
						
						@if($question->solved == 0)
							{{Form::checkbox('solved',1,false)}}

						@elseif($question->solved == 1)
							{{Form::checkbox('solved',0,true)}}
						@endif
					</div>
					</div>



           		{{Form::hidden('question_id',$question->id)}}
                  


                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Update', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

	

@stop

