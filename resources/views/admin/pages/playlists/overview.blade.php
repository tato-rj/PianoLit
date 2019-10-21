<div id="playlists-overview" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Overview</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          @foreach($playlists as $playlist)
          <div class="col-lg-4 col-md-6 col-12 mb-2">
            <div class="bg-light text-muted mb-2 rounded px-1"><strong><span class="text-blue mr-2">{{$loop->iteration}}</span>{{$playlist->name}}</strong></div>
            <div class="px-1">
              @foreach($playlist->pieces as $piece)
              <div>
                <div style="line-height: 1"><small>{{$loop->iteration}}. {{$piece->medium_name}}</small></div>
                <div class="text-muted" style="line-height: 1"><small>{{$piece->composer->short_name}}</small></div>
              </div>
              @endforeach
            </div>
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
</div>