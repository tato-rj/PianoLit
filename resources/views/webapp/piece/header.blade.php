<section class="text-center mb-5 position-relative">
	@if(url()->previous() != url()->current())
	<a class="btn-raw position-absolute link-none" href="{{url()->previous()}}" style="left: 0; bottom: 50%; transform: translateY(50%); font-size: 1.44em">
		@fa(['icon' => 'chevron-left'])</a>
	@endif

	<div class="px-4">
		@include('webapp.components.piece.level')
		<h4 class="mt-2 mb-1">{{$piece->medium_name}}</h4>
		<p class="text-muted">{{$piece->composer->name}}</p>
	</div>

	<button class="btn-raw position-absolute" type="More options"  
	data-toggle="fixed-panel" data-target="#options-panel" style="right: 0; bottom: 50%; transform: translateY(50%); font-size: 1.44em">
		@fa(['icon' => 'ellipsis-v'])</button>
</section>