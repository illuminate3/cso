@extends('app')
@section('content')
	<!-- child menu -->
	@if($button)
	<ul>
		@foreach($button as $item)
			<li> <a class="mainbutton" href="{{url('/page/'.$item->slug)}}">{{$item->name}}</a></li>
		@endforeach
	</ul>
	@endif
	@if($articles)
		{!!$articles->text!!}
		
		<!-- files list -->
		<ul>
		@if(isset($files))
			@foreach($files as $file)
			<li><a  href="{{url($file->url)}}">{{$file->name}}</a></li>
			@endforeach
		@endif
		</ul>
	@endif
@stop