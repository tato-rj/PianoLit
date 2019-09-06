<nav class="navbar navbar-expand-lg navbar-light py-5">
  <a class="navbar-brand" href="{{route('home')}}">
      <img src="{{asset('images/brand/app-icon.svg')}}" style="border-radius: 20%; width: 50px" class="mr-2">
      <h3 class="font-primary align-middle m-0 d-none d-sm-inline-block"><span>PianoLIT</span></h3>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Tools
        </a>
        <div class="dropdown-menu p-2" style="font-size: .9em" aria-labelledby="navbarDropdown">
          <label style="font-size: .9em" class="m-0 text-grey"><small>THEORY</small></label>
          <a class="nav-link p-0 mb-1 ml-1" href="{{route('tools.circle-of-fifths')}}">Circle of Fifths</a>
          <a class="nav-link p-0 mb-1 ml-1" href="{{route('tools.chord-finder.index')}}">Chord Finder</a>
          <div class="dropdown-divider"></div>
          <label style="font-size: .9em" class="m-0 text-grey"><small>TECHNIQUE</small></label>
          <a class="nav-link p-0 mb-1 ml-1" href="{{route('tools.scales.index')}}">Scales</a>
          <a class="nav-link p-0 mb-1 ml-1" href="{{route('tools.arpeggios.index')}}">Arpeggios</a>
          <div class="dropdown-divider"></div>
          <label style="font-size: .9em" class="m-0 text-grey"><small>MISC</small></label>
          <a class="nav-link p-0 ml-1" href="{{route('tools.staff')}}">Staff Generator</a>
        </div>
      </li>
      <li class="nav-item dropdown mx-2">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Games
        </a>
        <div class="dropdown-menu p-2" style="font-size: .9em" aria-labelledby="navbarDropdown">
          <a class="nav-link p-0 mb-2 ml-1" href="{{route('quizzes.index')}}">Quizzes</a>
          <a class="nav-link p-0 ml-1" href="{{route('riddles')}}">Riddles</a>
        </div>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="{{route('posts.index')}}">Blog</a>
      </li>
      <li class="nav-item mx-2">
        <a class="nav-link" href="{{route('youtube')}}" target="_blank">Youtube</a>
      </li>
      <li class="nav-item mx-2">
        <button class="nav-link bg-transparent border-0 show-overlay" data-target="#search-overlay"><i class="fas fa-search"></i><span class="ml-2 d-inline-block d-sm-none">Search here</span></button>
      </li>
    </ul>
  </div>
</nav>