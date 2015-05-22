@extends('app')
@section('content')
	@if($article)
	{!!$article->text!!}
	@endif
@stop