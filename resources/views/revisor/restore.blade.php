<x-layout>
  {{-- @dd($articles); --}}
    {{-- <x-header>
        Articoli Scartati
    </x-header> --}}

    <div class="container">
      <div class="row justify-content-center">
          <div class="col-12 my-5">
              <h1>Annunci scartati</h1>
          </div>
      </div>
  </div>

  <div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
          @if(session('articleAccepted'))
            <div class="alert alert-success shadow rounded text-center mb-5">
                {{session('articleAccepted')}}
            </div>
          @endif
        </div>
    </div>
  </div>


    <div class="container vh-100">
      <div class="row justify-content-center">
          <div class="col-12">
            <table class="table grigio">
                <thead>
                  <tr>
                    <th class="fs-5" scope="col">Titolo</th>
                    <th class="fs-5" scope="col">Prezzo</th>
                    <th class="fs-5" scope="col">Categoria</th>
                    <th class="fs-5" scope="col">Descizione</th>
                    <th class="fs-5" scope="col">Azioni</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach($articles as $article)
                    {{-- @dd($article) --}}
                    <tr>
                        <th scope="row">{{$article->title}}</th>
                        <td>{{$article->price}}</td>
                        <td>{{$article->category->name}}</td>
                        <td>{{$article->description}}</td>
                        {{-- <td>{{$article->is_accepted}}</td> --}}
                        <td>
                          <form action="{{route('revisor.accept_article',['article' => $article])}}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button class="btn btn-success">Conferma annuncio</button>
                          </form>
                          {{-- <a class="btn btn-warning" href="{{route('article.show', ['article'=> $article])}}">Dettaglio articolo</a> --}}
                        </td>
                    </tr>
                  @endforeach
              </tbody>
            </table>
          </div>
      </div>
    </div>

</x-layout>