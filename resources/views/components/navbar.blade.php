<div class="container">
  <div class="row">
    <div class="col">

      <nav class="navbar navbar-expand-lg bg-warning bg-giallo shadow mb-5">
        <div class="container-fluid">

          <div id="containernavbarmobile">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <a class="d-none logonavbarmobile navbar-brand" href="{{route('homepage')}}">
              <img src="/imgs/logo.png" alt=""logo presto.it>
            </a>
          </div>

          <div class="collapse navbar-collapse justify-content-between navmobile" id="navbarSupportedContent">

            {{-- Div con voci iniziali --}}
            <div class="d-flex align-items-center ps-lg-5 ps-xxl-0">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-lg-column flex-xxl-row">
                <li class="nav-item">
                  <a class="nav-link effectlink {{Route::is('homepage') ? 'active' : ''}}" aria-current="page" href="{{route('homepage')}}">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link effectlink {{Route::is('article.index') ? 'active' : ''}}" href="{{route('article.index')}}">{{__('ui.annunci-nav')}}</a>
                </li>
                @auth
                  <li class="nav-item">
                    <a class="nav-link effectlink {{Route::is('article.create') ? 'active' : ''}}" href="{{route('article.create')}}">{{__('ui.inse-ann-nav')}}</a>
                  </li>
                  @if(Auth::user()->is_revisor)
                  <li class="nav-item">
                    <a class="nav-link effectlink {{Route::is('revisor.index') ? 'active' : ''}}" href="{{route('revisor.index')}}">{{__('ui.revisor-nav')}}
                    <span class="position-absolut top-0 start-100 translate-middle badge roundend-pill bg-magenta">{{App\Models\Article::toBeRevisionedCount()}}
                    <span class="visually-hidden">Notifiche</span>
                    </span>
                    </a>
                  </li>
                  @endif
                @endauth
              </ul>
            </div>

            <hr class="d-none pb-3">

            {{-- Div con logo e barra di ricerca --}}
            <div class="d-flex align-items-center flex-lg-column flex-xxl-row logoandsearch">
              <a class="navbar-brand" href="{{route('homepage')}}">
                <img src="/imgs/logo.png" alt="logo presto.it" class="logonavbar">
              </a>
              <form action="{{route('article.search')}}" method="GET" class="d-flex">
                <input name="searched" class="form-control me-2" type="search" placeholder="" aria-label="Search">
                <button class="btn btn-outline-success verde" type="submit">{{__('ui.cerca-nav')}}</button>
              </form>
            </div>

            {{-- Div con categorie, bandiere e login --}}
            <div class="d-flex align-items-center pe-lg-5 pe-xxl-0">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-lg-column flex-xxl-row">
                <li class="nav-item dropdown list-unstyled text-center my-3 my-xxl-0 order-2 order-xxl-1">
                  <a class="nav-link text-white" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.cat-nav')}}
                  </a>
                  <ul class="dropdown-menu widthdrop">

                    @foreach($categories as $category)
                    {{-- @dd($category); --}}
                    <li><a class="dropdown-item grigio" href="{{route('categories.show', compact('category'))}}">

                      @if($category->id == 1)
                        <i class="fa-solid fa-shirt magenta pe-2"></i>
                        @elseif($category->id == 2)
                        <i class="fa-solid fa-couch magenta pe-2"></i>
                        @elseif($category->id == 3)
                        <i class="fa-solid fa-landmark magenta pe-2"></i>
                        @elseif($category->id == 4)
                        <i class="fa-solid fa-car magenta pe-2"></i>
                        @elseif($category->id == 5)
                        <i class="fa-solid fa-desktop magenta pe-2"></i>
                        @elseif($category->id == 6)
                        <i class="fa-solid fa-seedling magenta pe-2"></i>
                        @elseif($category->id == 7)
                        <i class="fa-solid fa-book magenta pe-2"></i>
                        @elseif($category->id == 8)
                        <i class="fa-solid fa-gem magenta pe-2"></i>
                        @elseif($category->id == 9)
                        <i class="fa-solid fa-music magenta pe-2"></i>
                        @elseif($category->id == 10)
                        <i class="fa-solid fa-volleyball magenta pe-2"></i>
                        @elseif($category->id == 11)
                        <i class="fa-solid fa-plane magenta pe-2"></i>
                      @endif

                      {{$category->name}}</a></li>
                    @endforeach
                  </ul>
                </li>

                {{-- Bandiere --}}
                {{-- Bandiera en --}}
                <span class="d-flex order-xxl-2 justify-content-evenly">
                  <li class="nav-item">
                    <x-_locale lang="en"/>
                  </li>
                  {{-- Bandiera it --}}
                  <li class="nav-item">
                    <x-_locale lang="it"/>
                  </li>
                  {{-- Bandiera es --}}
                  <li class="nav-item">
                    <x-_locale lang="es"/>
                  </li>
                </span>

                {{-- se loggato --}}
                @auth
                <li class="nav-item dropdown list-unstyled order-3">
                  <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    {{__('ui.benvenuto')}} {{Auth::user()->name}}
                  </a>
                  <ul class="dropdown-menu w-100 centerfield" aria-labelledby="navbarDropdown">
                    <li>
                      <a class="dropdown-item grigio" href="#">
                        <i class="fa-solid fa-user magenta pe-2"></i>
                        Profilo
                      </a>
                    </li>
                    <li>
                      <a class="dropdown-item grigio" onclick="event.preventDefault(); document.querySelector('#form-logout').submit();" href="#">
                        <i class="fa-solid fa-right-from-bracket magenta pe-2"></i>
                          Logout
                      </a>
                      <form id="form-logout" method="POST" action="{{route('logout')}}"class="d-none">
                        @csrf
                      </form>
                    </li>
                  </ul>
                </li>

                  {{-- se sloggato --}}
                  @else
                  <li class="nav-item dropdown list-unstyled order-3">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                      {{__('ui.benvenuto')}}
                    </a>
                    <ul class="dropdown-menu w-100 centerfield" aria-labelledby="navbarDropdown">
                      <li>
                        <a class="dropdown-item grigio" href="{{route('login')}}">
                          <i class="fa-solid fa-right-to-bracket magenta pe-2"></i>
                          Login
                        </a>
                      </li>
                      <li>
                        <a class="dropdown-item grigio" href="{{route('register')}}">
                          <i class="fa-solid fa-pen-to-square magenta pe-2"></i>
                          Register
                        </a>
                      </li>
                    </ul>
                  </li>
                {{-- </li> --}}
              </ul>
              @endauth

            </div>

          </div>
        </div>
      </nav>

    </div>
  </div>
</div>
