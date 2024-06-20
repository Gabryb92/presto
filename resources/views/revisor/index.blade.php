<x-layout>

    <x-header>
        {{$article_to_check ? 'Annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}
    </x-header>


    {{-- <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9 text-center testoheaderhome">
                <h1 class="display-2">
                    {{$article_to_check ? 'Annuncio da revisionare' : 'Non ci sono annunci da revisionare'}}
                </h1>
            </div>
        </div>
    </div> --}}

    {{-- Messaggi conferma/rifiuta --}}
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-9">

                @if(session('articleAccepted'))
                    <div class="alert alert-success shadow rounded text-center">
                        {{session('articleAccepted')}}
                    </div>
                @endif

                @if(session('articleReject'))
                    <div class="alert alert-danger shadow rounded text-center">
                        {{session('articleReject')}}
                    </div>
                @endif
            </div>
        </div>
    </div>


    @if ($article_to_check)

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-12 col-md-9 p-5 shadow formstilo mb-5">
                    <h1 class="text-center">{{$article_to_check->title}}</h1>
                    @if(count($article_to_check->images) > 0)



                        {{-- <ul class="d-flex p-5 immagini"> --}}
                            {{-- @dd($article_to_check->images()) --}}
                            {{-- immagini caricate dall'utente --}}
                            @foreach ($article_to_check->images as $image)
                                {{-- <li class="mx-3 list-unstyled"> --}}
                                    {{-- <img src="{{$article_to_check->images()->first()->getUrl(400, 300)}}" alt=""> --}}
                                    <div class="row">
                                        <div class="col-12 col-md-6 my-2">
                                            <img class="img-fluid" src="{{$image->getUrl(300, 300)}}" alt="">
                                        </div>

                                        <div class="col-12 col-md-3 border-end my-2 text-center">
                                            <h5 class="tc-accent text-center mx-3">Tags</h5>
                                            <div class="p-2 text-center">
                                                @if($image->labels)
                                                    @foreach ($image->labels as $label)
                                                        <p class="d-inline">{{$label}} ,</p>
                                                    @endforeach
                                                @endif
                                            </div>
                                        </div>


                                        <div class="col-12 col-md-3 my-2 text-center">
                                            <div class="card-body text-center mx-3">
                                                <h5 class="tc-accent">Revisione Immagini</h5>
                                                <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                                <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                                <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                                <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                                <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>

                                            </div>
                                        </div>
                                    </div>


                                    {{-- <div class="col-12 col-md-3">
                                        <div class="card-body">
                                            <h5 class="tc-accent">Revisione Immagini</h5>
                                            <p>Adulti: <span class="{{$image->adult}}"></span></p>
                                            <p>Satira: <span class="{{$image->spoof}}"></span></p>
                                            <p>Medicina: <span class="{{$image->medical}}"></span></p>
                                            <p>Violenza: <span class="{{$image->violence}}"></span></p>
                                            <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>

                                        </div>
                                    </div> --}}

                                {{-- </li> --}}

                                {{-- </li> --}}
                            @endforeach


                    @else

                            <div class="row justify-content-center">
                                <div class="col-12 col-md-6 d-flex">
                                    <div class="justify-content-center">
                                        <img class="pb-5 img-fluid ms-auto me-auto" src="/imgs/logo.png" alt="">
                                    </div>
                                </div>
                            </div>
                            {{-- se non ci sono immagini le metto di default --}}





                        {{-- se non ci sono immagini le metto di default --}}


    @endif

                        {{-- </ul> --}}
                        <div class="my-4">
                            {{-- <h3 class="text-center">{{$article_to_check->title}}</h3> --}}

                            <p class="text-center">{{$article_to_check->description}}</p>
                            <hr>
                            <p class="text-center">{{$article_to_check->category->name}} - {{$article_to_check->price}} €</p>
                            <hr>
                            <p class="text-center">Creato da: {{$article_to_check->user->name}} il: {{$article_to_check->created_at->format('d/m/Y')}}</p>
                            <hr>
                        </div>


                    {{-- Pulsanti Accetta & Rifiuta --}}
                    <div class="row">
                        <div class="col-6 col-md-6">
                            <form action="{{route('revisor.accept_article',['article'=> $article_to_check])}}" method="POST">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-success">
                                    <i class="fa-solid fa-check iconbutton"></i>
                                    Accetta
                                </button>
                            </form>
                        </div>
                        <div class="col-6 col-md-6">
                            <form action="{{route('revisor.reject_article',['article'=> $article_to_check])}}" method="POST" class="d-flex justify-content-end">
                                @csrf
                                @method('PATCH')

                                <button class="btn btn-danger">
                                    <i class="fa-solid fa-xmark iconbutton"></i>
                                    Rifiuta
                                </button>
                            </form>
                        </div>
                    </div>

                    {{-- Google Api --}}
                    {{-- <div class="col-md-3 border-end">
                        <h5 class="tc-accent">Tags</h5>
                        <div class="p-2">
                            @if($image->labels)
                                @foreach ($image->labels as $label)
                                    <p class="d-inline">{{$label}} ,</p>
                                @endforeach
                            @endif
                        </div>
                    </div> --}}

                    {{--
                    <div class="col-12 col-md-3">
                        <div class="card-body">
                            <h5 class="tc-accent">Revisione Immagini</h5>
                            <p>Adulti: <span class="{{$image->adult}}"></span></p>
                            <p>Satira: <span class="{{$image->spoof}}"></span></p>
                            <p>Medicina: <span class="{{$image->medical}}"></span></p>
                            <p>Violenza: <span class="{{$image->violence}}"></span></p>
                            <p>Contenuto Ammiccante: <span class="{{$image->racy}}"></span></p>

                        </div>
                    </div> --}}

    @endif

                    {{-- Pulsante vista articoli da revisionare --}}
                    @auth
                    <div class="container">
                        <div class="row justify-content-center mt-5 pt-4">
                            <div class="col-12 text-center">
                                    <a class="btn btn-info text-white fw-bold" href="{{route('revisor.restore')}}">
                                        <i class="fa-solid fa-binoculars iconbutton text-white"></i>
                                        Revisiona gli annunci scartati
                                    </a>
                            </div>
                        </div>
                    </div>
                    @endauth


                </div>
            </div>


        </div>

</x-layout>