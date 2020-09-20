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

@env('local')
<div class="">
@foreach($explore as $row)
	@include('webapp.explore.rows.'.strtolower(firstword($row['label'])))
@endforeach
</div>
@else

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
@endenv
</section>

@endsection

@push('scripts')
<script type="text/javascript">

</script>

<script type="text/javascript">
$('#tags-search .tag').on('click', function() {
	$('#tags-search button').disable();
	$('#tags-search .tag').not(this).removeClass('btn-teal');
	$(this).toggleClass('btn-teal');
	
	let $results = $(this).closest('.modal-body').find('.search-results');
	let tags = $('#tags-search .tag.btn-teal').attrToArray('data-name');

	$results.empty();

	if (tags.length == 0) {
		$('#tags-search button').enable();
		return;
	}

	$results.html('<div class="text-muted text-center mb-3"><i>Searching...</i></div>');

  	axios.get(window.urls.searchCount, {params: {search: tags.join(' ')}})
  		.then(function(response) {
  			$results.html(response.data);
  		})
  		.catch(function(error) {
  			$results.html('<div class="text-red text-center mb-3"><i>Sorry, something went wrong...</i></div>');
  		})
  		.then(function() {
  			$('#tags-search button').enable();
  		});
});
</script>

<script type="text/javascript">
let recent = getRecent();

showRecent();
$('input[name="search"]').keyup(function() {
	console.log($(this).val().length);
})
$('#search-form').on('submit', function() {
	let query = $(this).find('input[name="search"]').val();
	saveRecent(query, recent);
});

$('.recent-query').on('click', function() {
	submitRecent($(this).text());
});

function getRecent() {
	let cookie = getCookie('pl_recent');

	if (typeof cookie === 'undefined' || cookie === null)
		return [];

	return cookie.length ? JSON.parse(cookie) : [];
}

function showRecent() {
	if (recent.length) {
		let $recentContainer = $('#most-recent');

		for (let i=0; i< recent.length; i++) {
			$recentContainer.find('> div').append('<span class="recent-query cursor-pointer m-1 rounded-pill border border-grey px-2"><small style="line-height: 2"><i class="fas fa-search fa-sm text-muted mr-1"></i>'+recent[i]+'</small></span>');
		}

		$recentContainer.show();
	}
}

function saveRecent(query, recent) {
	if (! recent.includes(query) && query.length <= 18)
		recent.unshift(query);

	if (recent.length > 5)
		recent.pop();

	setCookie('pl_recent', JSON.stringify(recent), 30);
}

function submitRecent(recent) {
	let $form = $('#search-form');
	$form.find('input[name="search"]').val(recent);
	$form.submit();
}
</script>
@endpush