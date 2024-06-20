<x-layout>
    <x-header>
        Tutti gli annunci
    </x-header>

    <div class="container-fluid">

        {{-- <div class="row justify-content-center"> --}}
            {{-- <div class="col-12 col-md-1">
                <a href="{{route('homepage')}}" class="btn btn-success">
                    <i class="fa-solid fa-house iconbutton"></i>
                    Torna alla home
                </a>
                </div> --}}
        {{-- </div> --}}

            @livewire('article-index')

        {{-- Pulsante a fondo pagina --}}
        <div class="container text-center mt-5">
            <div class="row">
            <div class="col">
                <a href="{{route('homepage')}}" class="btn btn-success">
                    <i class="fa-solid fa-house iconbutton"></i>
                    Torna alla homepage
                </a>
            </div>
            </div>
        </div>

    </div>

</x-layout>