<div class="text-center p-4">
	<p class="m-0 text-nowrap">We found <strong>{{$count}} {{ str_plural('piece', $count) }}</strong></p>
	@if($count)
	<form class="mt-3" method="GET" action="{{route('webapp.search.results')}}">
		<input type="hidden" name="search" value="{{$query}}">
		<button type="submit" class="btn rounded-pill text-nowrap btn-primary btn-wide">@fa(['icon' => 'lightbulb'])See results</button>
	</form>
	@endif
</div>