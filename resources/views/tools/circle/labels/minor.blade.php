<div class="tab-pane fade" id="mode-minor" role="tabpanel">
	<div class="d-flex">
		<div>
			<div class="mb-4">
				@include('tools.circle.labels.title', ['title' => 'key'])
				<h4 class="key-name"></h4>
			</div>
			<div class="mb-4">
				@include('tools.circle.labels.title', ['title' => 'relative key'])
				<h4 class="key-relative"></h4>
			</div>
			<div class="mb-4">
				@include('tools.circle.labels.title', ['title' => 'neighbor keys'])
				<div class="key-neighbors"></div>
			</div>
		</div>
		<div>
			<img class="key-signature" data-folder="{{asset('images/misc/keys/')}}" src="{{asset('images/misc/keys/key-loading.svg')}}" style="width: 200px">
		</div>
	</div>

	<div>
		@include('tools.circle.labels.title', ['title' => 'functional harmony'])
		<div class="mb-3 key-minor-roman d-flex"></div>
		<div class="row no-gutters mb-4">
			<div class="col-4 mb-2">
				<div class="">
					<label class="mb-1"><small><strong>TONIC</strong></small></label>
					<div class="key-tonic"></div>
				</div>
			</div>
			<div class="col-4 mb-2">
				<div class="">
					<label class="mb-1"><small><strong>DOMINANT</strong></small></label>
					<div class="key-dominant"></div>
				</div>
			</div>
			<div class="col-4 mb-2">
				<div class="">
					<label class="mb-1"><small><strong>SUBDOMINANT</strong></small></label>
					<div class="key-subdominant"></div>
				</div>
			</div>
			<div class="col-12 text-muted">
				<small>* dominant chords must have the key's major 7th (the leading tone) in them, that is why we raise this note on minor keys and the V becomes major, the III augmented and the VII diminished.</small>
			</div>
		</div>
	</div>

	<div>
		@include('tools.circle.labels.title', ['title' => 'negative harmony'])
		<div class="key-negative d-flex"></div>
	</div>
</div>