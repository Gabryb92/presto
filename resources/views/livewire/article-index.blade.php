<div class="row justify-content-center mt-5">
            @forelse ($articles as $article)
        <div class="col-lg-5 col-md-6 col-sm-9 col-xl-4 col-xxl-3 col-12 p-5">
            <div class="card articolo shadow position-realative border-0 wrapper ms-2 me-2">
                <a class="hoverimmagine" href="{{route('article.show', compact('article'))}}">
                    <img src="{{!$article->images()->get()->isEmpty() ? ($article->images()->first()->getUrl(300,300)) : "/imgs/logo.png"}}" class="w-100 imgarticolo" alt="prodotto">
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
                <div class="d-flex justify-content-end">
                    <a href="{{route('article.show', compact('article'))}}" class=""><h1 class="scopridi">scopri di<i class="btn bi bi-plus-circle btnpluscard"></i></h1></a>
                </div>
            </div>
        </div>
    

    </div>
        @empty
        <div class="container-fluid">
            <h1 class="testoheaderh1home vh-100">Non ci sono prodotti da visualizzare.</h1>
        </div>
        @endforelse

</div>
