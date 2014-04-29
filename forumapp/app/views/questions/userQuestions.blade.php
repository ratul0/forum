@extends('layouts/master')

@section('content')
	<h1>{{$useremail}} Questions:</h1>

	@if(empty($questions))
		<h1>You've not posted any questions yet.</h1>

	@else
		<ul>
			@foreach($questions as $question)
			<li>
				{{e($question->question)}} - 
				{{($question->solved) ? ("(Solved) - ") : ("") }}
				{{HTML::linkRoute('questions.edit','Edit',$question->id)}} - 
				{{HTML::linkRoute('questions.show','View',$question->id)}}
			</li>
			@endforeach
		</ul>


		{{$questions->links()}}
	@endif
@stop