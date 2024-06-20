<footer class="container-fluid bg-dark text-center text-white bg-giallo shadow grigio mt-5 px-0">
    <div class="container">

          <div class="row d-flex justify-content-center">
            @if(Auth::user() && Auth::user()->is_revisor == 1)
            <p class="pt-2">
              {{-- <span>Sei già un revisore</span> --}}
              <a href="{{route('revisor.index')}}" class="fw-bold btn btnfooter text-white mt-2">
                {{__('ui.revisor-nav')}}
              </a>
            </p>
            @else
            <div class="col-auto">
              <p class="pt-2">
                {{-- <strong>Vuoi unirti al team di presto.it?</strong> --}}
                <strong class="d-block">{{__('ui.footer1')}}
                  <img src="/imgs/logo.png" alt="" class="logofooter">
                </strong>
                <a href="{{route('become.revisor')}}" class="fw-bold btn btnfooter text-white mt-2">
                  {{__('ui.footer2')}}
                </a>
              </p>
            </div>
            @endif
          </div>

    </div>

    <div class="text-center py-3" style="background-color: rgba(0, 0, 0, 0.1)">
      © 2022 Copyright &sim;
      <a class="grigio" href="{{route('homepage')}}">Presto.it</a>
    </div>

  </footer>