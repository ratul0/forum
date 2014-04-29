@extends('layouts/master')

@section('content')
	<div id="ask">

		@if(Auth::check())


			<!--login form -->
         <div class="well">
              {{Form::open(array('route'=>'questions.store','class'=>'bs-example form-horizontal'))}}
                <fieldset>
                  <legend>Ask a Question</legend>
                  <div class="form-group">
                    {{Form::label('question', "Question", $attributes = array('class'=>'col-lg-2 control-label'))}}
                    <div class="col-lg-10">
                      {{Form::textarea('question', NULL,$attributes = array('class'=>'form-control','placeholder'=>"Ask your Question",'id'=>'question'))}}
						
						{{$errors->first('question')}}


                    </div>
                  </div>

                 
           
                  <div class="form-group">
                    <div class="col-lg-10 col-lg-offset-2">
                
                      {{Form::submit('Ask a Question', $attributes = array('class'=>'btn btn-primary'))}}

                    </div>

                  </div>
				
                  

                </fieldset>
              {{Form::close()}}


            </div>

            @else
            	<h1>please login to ask or answer a question.</h1>


		@endif
	</div>
  <hr>
  <div id="questions">
    <h2>Unsolved Questions</h2>
      @if(empty($questions))
        <p>No questions have been asked</p>
      @else
        <ul>
          @foreach($questions as $question)
            <li>{{HTML::linkRoute('questions.show',$question->question,$question->id)}}
             [ {{$question->user->email}} ]

             {{count($question->answers)}} Answers

           </li>
          @endforeach
        </ul>
        {{$questions->links()}}
      @endif

  </div>


@stop