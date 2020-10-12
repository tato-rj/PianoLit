<div class="row pb-5">
	<div class="col-lg-8 col-md-10 col-12 mx-auto row pt-3">
		<div class="col-lg-6 col-md-6 col-12">
			@include('shop.components.cover')
		</div>
		<div class="col-lg-6 col-md-6 col-12 d-flex align-items-center">
			<div>
				@topics(['topics' => \App\Blog\Post::first()->topics, 'route' => 'ebooks.topic'])
				<div>
					<h4 class="mb-4 clamp-2"><strong>{{$product->title}}</strong></h4>
					@include('shop.components.highlights')
				</div>
				
				<div>
					<div class="mb-2">
						@include('shop.components.price')
					</div>
					<div>
						@include('shop.components.action')
					</div>
					<div>
						@include('shop.components.preview.button')
					</div>
				</div>
			</div>
		</div>
	</div>
</div>