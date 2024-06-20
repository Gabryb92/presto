<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    {{-- Google Font --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Merriweather+Sans:ital,wght@0,800;1,700;1,800&family=Montserrat+Alternates:ital,wght@0,800;1,800;1,900&family=Numans&display=swap" rel="stylesheet">
    @livewireStyles

@vite(['resources/js/app.js', 'resources/css/app.css'])

<title>presto.it</title>
</head>
<body>
<x-navbar />

    {{-- Messaggi di conferma/errore --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6">
                @if(session('revisorAccept'))
                    <div class="alert alert-success shadow rounded text-center">
                        {{session('revisorAccept')}}
                    </div>
                @endif

                @if(session('access.denied'))
                    <div class="alert alert-danger shadow rounded text-center">
                        {{session('access.denied')}}
                    </div>
                @endif

                @if(session('emailRevisor'))
                    <div class="alert alert-success shadow rounded text-center">
                        {{session('emailRevisor')}}
                    </div>
                @endif
            </div>
        </div>
    </div>


    {{-- HEADER HOMPAGE --}}
    <div id="carouselExampleControls" class="carousel slide carohome" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="container-xxl hero-header">
                    <div class="container px-lg-3">
                        <div class="row g-3 align-items-top">
                            <div class="col-lg-6 text-center text-lg-start">
                                <img class="img-fluid" src="/imgs/header/header2.png" alt="">
                            </div>
                                <div class="col-lg-6 text-center text-lg-start">
                                    <h1 class="text-white mb-4 titolo1header"><br>{{__('ui.header1')}}<p class="pride">PRESTO</p></h1>
                                    <a href="{{route('article.create')}}" class="btn btn-success py-sm-3 px-sm-5 rounded-pill me-3 pulsantonehome">{{__('ui.tasto1')}}</a>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-xxl hero-header">
                    <div class="container px-lg-3">
                        <div class="row g-3 align-items-top">
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="text-white mb-4 titolo1header"><br>{{__('ui.header2')}} <p class="pride">PRIDE</p></h1>
                                <a href="{{route('article.index')}}" class="btn btn-primary py-sm-3 px-sm-5 rounded-pill me-3 pulsantonehome">{{__('ui.tasto2')}}</a>
                            </div>
                            <div class="col-lg-6 text-center text-lg-start titolo1header">
                                <img class="img-fluid" src="/imgs/header/header3.png" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="container-xxl hero-header">
                    <div class="container px-lg-3">
                        <div class="row g-3 align-items-top">
                            <div class="col-lg-6 text-center text-lg-start">
                                <img class="img-fluid" src="/imgs/header/header4.png" alt="">
                            </div>
                            <div class="col-lg-6 text-center text-lg-start">
                                <h1 class="text-white mb-4 titolo1header"><br>{{__('ui.header3')}} <p class="pride">PRESTO</p></h1>
                                <a href="{{route('article.create')}}" class="btn btn-success py-sm-3 px-sm-5 rounded-pill me-3 pulsantonehome">{{__('ui.tasto3')}}</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>

    </div>
{{-- </div> --}}

    {{-- FINE HEADER HOME --}}


    <div class="row justify-content-center mt-5 ms-2 me-2 bg-giallo">
        @if(count($articles) > 0)
        <h1 class="titolo p-3 mt-2 me-auto text-center">{{__('ui.ultimiart')}}
            <br>
            <br>
        </h1>
        @endif       
            @forelse ($articles as $article)
            <div class="col-lg-5 col-md-6 col-sm-9 col-xl-4 col-xxl-3 col-12 p-5">            <div class="card articolo shadow position-realative border-0 wrapper">
                <a class="hoverimmagine" href="{{route('article.show', compact('article'))}}">
                <img src="{{!$article->images()->get()->isEmpty() ? ($article->images()->first()->getUrl(300,300)) : "/imgs/logo.png"}}" class="w-100 imgarticolo" alt="prodotto">
                <div class="filter"></div>
                <div class="card-body">
                    <div class="d-flex justify-content-end align-items-left">
                        <h5><span class="badge magenta bg-giallo badgeart">{{$article->category->name}}</span></h5>
                    </div>
                  <h5 class="card-title sottotitolo titolocard text-truncate">{{$article->title}}</h5>
                  <p class="card-text text-truncate">{{$article->description}}...</p>
                  <div class="d-flex justify-content-left">
                    <h5><span class="badge giallo bg-magenta titolo badgeprezzo">{{$article->price}} €</span></h5>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="{{route('article.show', compact('article'))}}"><h1 class="scopridi">scopri di<i class="btn bi bi-plus-circle btnpluscard"></i></h1></a>
                </div>
            </div>
        </div>
    </a>

    </div>
        @empty
    </div>

        {{-- <div class="container-fluid align-baseline"> --}}
            <h1 class="testoheaderh1home text-center fs-1">Non ci sono prodotti da visualizzare.</h1>
        {{-- </div> --}}

        @endforelse

        {{-- Pulsante a fondo pagina --}}
        <div class="container text-center my-5">
            <div class="row">
              <div class="col">
                <a href="{{route('article.index')}}" class="btn btn-success">
                    Vai a tutti gli annunci
                    <i class="fa-solid fa-arrow-right-long iconbutton2"></i>
                </a>
              </div>
            </div>
        </div>
    </div>

        {{-- Sezione categorie --}}
        <div class="container margincategory">
            <div class="row justify-content-center ms-2 me-2 py-5 bg-giallo">
                <div>
                    <h1 class="titolo p-3 mt-0 me-auto text-center">
                        {{__('ui.cat-nav')}}
                    </h1>
                </div>
                <div class="col d-flex flex-wrap justify-content-center">
                    @foreach ($categories as $category)
                        <a class="text-center grigio categoryhome m-3" href="{{route('categories.show', compact('category'))}}">
                            <div class="card pt-3 shadow shake">
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
                                    <div class="card-body">
                                        <h5 class="card-title sottotitolo">{{$category->name}}</h5>
                                    </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </div>

    <x-footer />

    @livewireScripts

</body>
</html>