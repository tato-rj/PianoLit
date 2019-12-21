<div class="card border-0 mb-2 {{$loop->first && $isNew ? 'selected' : null}}">
  <div class="cursor-pointer d-flex align-items-center py-3" data-toggle="collapse" data-target="#{{str_slug($title)}}">
    <h6 class="m-0 number text-grey bg-light rounded-circle d-flex flex-center mr-2" style="width: 22px; height: 22px">{{$loop->iteration}}</h6>
    <h6 class="m-0 title text-muted">
      {{$title}}<span class="ml-1 text-grey"><small>({{$count}} questions)</small></span>
    </h6>
  </div>

  <div id="{{str_slug($title)}}" class="collapse {{$loop->first && $isNew ? 'show' : null}}" data-parent="#steps">
    <div class="card-body border-left border-1x" style="margin-left: .6rem!important;">
      {{$slot}}
    </div>
  </div>
</div>