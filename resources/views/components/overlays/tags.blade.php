@component('layouts.overlay', ['name' => 'results', 'light' => true, 'position' => 'center'])
<div class="text-center">
	<div class="text-center searching">
		@include('components.animations.searching')
	</div>
	<div class="text-center positive-results" style="display: none;">
		<img src="{{asset('images/icons/smiling.svg')}}" width="80" class="mb-4">
		<p class="mb-4" style="font-size: 1.4em">We found <span class="text-primary results-count"></span> pieces!</p>
		<form method="POST" action="{{route('subscriptions.store')}}" style="max-width: 380px">
			@csrf
			<input type="hidden" name="subscription_name" placeholder="Your name here">
			<input type="hidden" name="started_at" value="{{now()}}">
			<p>The <strong>PianoLIT</strong> app is coming up soon. Would you like us to let ou know when it is ready for download?</p>
			<div class="form-group">
				<input required type="email" name="email" class="form-control input-center" placeholder="Your email address">
			</div>

			<button type="submit" class="btn btn-primary btn-block mb-2">Yes!</button>
			
			<div class="text-muted"><small>Ps: we'll never share your email with anyone</small></div>
		</form>
		{{-- <a href="#" class="btn btn-primary btn-wide shadow"><i class="fab fa-apple mr-3"></i>Download the app now to see them!</a> --}}
	</div>
	<div class="text-center empty-results" style="display: none;">
		<img src="{{asset('images/icons/sad.svg')}}" width="80" class="mb-4">
		<p class="text-muted mx-5">We couldn't find any pieces matching your selection...</p>
		<p><strong>Please try again!</strong></p>
	</div>
</div>
@endcomponent