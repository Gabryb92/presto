<x-layout>

    <x-header>
        Accedi
    </x-header>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <form class="p-5 shadow formstilo mb-5" method="POST" action="{{route('login')}}">
                            @csrf

                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{$error}}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                                <div class="mb-3">
                                    <label for="email" class="form-label">Indirizzo Email</label>
                                    <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                                </div>
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" name="password" class="form-control" id="password">
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    <i class="fa-solid fa-right-to-bracket iconbutton"></i>
                                    Accedi
                                </button>
                                <a href="{{route('homepage')}}" class="btn btn-success">
                                    <i class="fa-solid fa-house iconbutton"></i>
                                    Torna alla home
                                </a>
                                <hr>
                                <p>Se non hai un account
                                    <a href="{{route('register')}}">clicca qui!</a>
                                </p>
                        </form>
                    </div>
                </div>
            </div>

</x-layout>