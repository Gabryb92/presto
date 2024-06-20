<x-layout>
    <x-header>
        {{$article->title}}
    </x-header>

    {{-- <div class="container">
        <div class="row justify-content-center shadow formstilo text-center pb-5">
            <div class="col-12 col-md-8">
                @if(count($article->images) > 0) 
                <div class="row justify-content-center">
                    @foreach($article->images as $image)
                    <div class="col-12 col-md-6 pt-5">
                        <img class="card-img-top p-3 rounded" src="{{$image ? $image->getUrl(400, 300) : "/imgs/logo.png" }}" alt="">
                    </div>
                    @endforeach
                </div>
                @else
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="justify-content-center">
                                <img class="pb-5 img-fluid ms-auto me-auto" src="/imgs/logo.png" alt="">
                            </div>
                        </div>
                    </div>
                @endif
                <hr class="hidden pt-1">
                <h3 class="text-center">{{$article->title}}</h3>
                <p>{{$article->description}}</p>
                <hr>
                {{$article->category->name}} - {{$article->price}}
                <hr>
                Creato da: {{$article->user->name}} il: {{$article->created_at->format('d/m/Y')}}
                <hr>
                <a href="{{route('article.index')}}" class="btn btn-primary">Tutti gli annunci</a>
                <a href="{{route('categories.show', ['category' => $article->category])}}" class="btn btn-primary">Torna alle categorie</a>
            </div>
        </div>
    </div> --}}



    {{-- Prova carosello --}}
    <div class="container">
        <div class="row justify-content-center shadow formstilo text-center pb-5">
            <div class="col-12 col-md-3">
                @if(count($article->images) > 0) 
                {{-- <div class="row justify-content-center"> --}}
                    {{-- Inizio carosello --}}
                    <div id="carouselExampleIndicators" class="carousel slide my-3 p-2" data-bs-ride="carousel">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            @foreach($article->images as $image)
                                <div class="carousel-item @if($loop->first)active @endif">
                                    <img class="img-fluid" src="{{$image ? $image->getUrl(300, 300) : "/imgs/logo.png" }}" class="d-block w-100" alt="...">
                                </div>
                            @endforeach
                          
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                        </button>
                      </div>
                    {{-- fine carosello --}}
                    {{-- <div class="col-12 col-md-6 pt-5">
                        <img class="card-img-top p-3 rounded" src="{{$image ? $image->getUrl(400, 300) : "/imgs/logo.png" }}" alt="">
                    </div> --}}
                {{-- </div> --}}
                @else
                    <div class="row justify-content-center">
                        <div class="col-12 col-md-6 d-flex">
                            <div class="justify-content-center">
                                <img class="pb-5 img-fluid ms-auto me-auto" src="/imgs/logo.png" alt="">
                            </div>
                        </div>
                    </div>
                @endif
                <hr class="hidden pt-1">
                <h3 class="text-center">{{$article->title}}</h3>
                <p>{{$article->description}}</p>
                <hr>
                {{$article->category->name}} - {{$article->price}} €
                <hr>
                Creato da: {{$article->user->name}} il: {{$article->created_at->format('d/m/Y')}}
                <hr>
                <a href="{{route('article.index')}}" class="btn btn-primary">Tutti gli annunci</a>
                <a href="{{route('categories.show', ['category' => $article->category])}}" class="btn btn-primary">Torna alle categorie</a>
            </div>
        </div>
    </div>




</x-layout>