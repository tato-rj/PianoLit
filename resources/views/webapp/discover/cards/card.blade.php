<div class="mr-3 cursor-pointer rounded h-100 d-flex align-items-end p-3 {{$type}} position-relative" 
data-url="{{$url}}"
style="@include('webapp.discover.rows.gradient-css', ['card' => $card])">
	@fa(['icon' => 'lock', 'classes' => 'absolute-top-left opacity-4', 'color' => 'white', 'if' => $locked])
	@pill(['label' => 'NEW', 'color' => 'white', 'text' => 'danger', 'pos' => 'top-right', 'if' => $new])
	<div class="text-white" style="width: 164px">
		<p class="mb-1 clamp-2" style="line-height: 1; font-size: 92%"><strong>{{$card->name}}</strong></p>
		<p class="m-0" style="line-height: 1"><small>{{$card->subtitle}}</small></p>
		{{$slot ?? null}}
	</div>
</div>