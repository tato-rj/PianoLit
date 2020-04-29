@extends('webapp.layouts.app')

@push('header')
<style type="text/css">

</style>
@endpush

@section('content')
@include('webapp.layouts.header', ['title' => 'Explore', 'subtitle' => 'Search or explore the repertoire by moods, genres, levels and more'])

<section class="mb-4">
	@include('webapp.search.form')
</section>

<section id="tags-search">
@foreach($categories as $title => $category)
	<div class="mb-3">
		<h5>{{ucfirst($title)}}</h5>
		<div class="d-flex flex-wrap">
		@foreach($category as $tag)
		    <button data-name="{{$tag->name}}" data-id="{{$tag->id}}" class="tag btn btn-light badge-pill m-2 px-3 py-1 text-nowrap">
		      {{$tag->name}}
		    </button>
		@endforeach
		</div>
	</div>
@endforeach
</section>

@endsection

@push('scripts')
<script type="text/javascript">
$('#tags-search .tag').on('click', function() {
	$('#tags-search button').disable();
	$('#tags-search .tag').not(this).removeClass('btn-teal');
	$(this).toggleClass('btn-teal');
	
	let tags = $('#tags-search .tag.btn-teal').attrToArray('data-name');

  	axios.get(window.urls.searchCount, {params: {search: tags.join(' ')}})
  		.then(function(response) {
  			$('#bottom-popup-content').html(response.data)
  			$('#bottom-popup').show();
  		})
  		.catch(function(error) {
  			$('#bottom-popup').fadeOut('fast');
  		})
  		.then(function() {
  			$('#tags-search button').enable();
  		});
});
</script>
@endpush