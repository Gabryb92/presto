<x-layout>
    {{-- <x-header>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h1 class="testoheader">
                        {{$category->name}}
                    </h1>
                    
                </div>
            </div>
        </div>
    </x-header> --}}

    <x-header>
        {{$category->name}}
    </x-header>

    
    
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            {{-- <div class="col-12 col-md-9"> --}}
                

                

                @forelse ($category->articles->sortByDesc('created_at') as $article)
                    {{-- <div class="card mb-5 shadow">
                        <div class="col-12 col-md-3">
                            <img class="card-img-top p-3 rounded" src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(400, 300) : "/imgs/logo.png" }}" alt="">                            
                            <div class="card-body">
                                <h5 class="card-title">{{$article->title}}</h5>
                                <h6 class="card-subtitle">{{$article->category->name}}, {{$article->price}}</h6>
                                <p class="card-text">{{$article->description}}</p>
                                <p>Pubblicato il: {{$article->created_at->format('d/m/Y')}}</p>
                                <a href="{{route('article.show', compact('article'))}}" class="btn btn-primary">Vedi di più</a>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-lg-5 col-md-6 col-sm-9 col-xl-4 col-xxl-3 col-12 p-5">
                        <div class="card articolo shadow position-realative border-0 wrapper ms-2 me-2">
                            <a class="hoverimmagine" href="{{route('article.show', compact('article'))}}">
                                <img src="{{!$article->images()->get()->isEmpty() ? $article->images()->first()->getUrl(300, 300) : "/imgs/logo.png" }}" class="w-100 imgarticolo" alt="prodotto">
                            </a>
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
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('article.show', compact('article'))}}" class=""><h1 class="scopridi">scopri di<i class="btn bi bi-plus-circle btnpluscard"></i></h1></a>
                            </div>
                        </div>
                    </div>
                @empty
                    {{-- @guest --}}
                    <h1>Nessun articolo di questa categoria aggiunto!</h1>
                    <a href="{{route('article.create')}}" class="inline">Aggiungine uno!</a>

                    {{-- @endguest --}}

                @endforelse
                    
                        <div class="row justify-content-center">
                            <div class="col-8 col-md-2 ms-5">
                                <a href="{{route('homepage')}}" class="btn btn-primary">
                                    <i class="fa-solid fa-house iconbutton"></i>
                                    Torna alla homepage
                                </a>
                            </div>
                        </div>
                    
            {{-- </div> --}}
        </div>
    </div>
</x-layout>