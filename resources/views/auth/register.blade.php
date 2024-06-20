<x-layout>

    <x-header>
        Registrati
    </x-header>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        <form class="p-5 shadow formstilo mb-5" method="POST" action="{{route('register')}}">
                            @csrf

                            {{-- Errore inserimento --}}

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
                                <label for="name" class="form-label">Nome</label>
                                <input type="text" name="name" class="form-control" id="name" value="{{old('name')}}">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Indirizzo Email</label>
                                <input type="email" name="email" class="form-control" id="email" value="{{old('email')}}">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="password">
                            </div>
                            <div class="mb-3">
                                <label for="password_confirmation" class="form-label">Conferma la tua Password</label>
                                <input type="password" name="password_confirmation" class="form-control" id="password_confirmation">
                            </div>
                            <button type="submit" class="btn btn-primary">
                                <i class="fa-solid fa-pen-to-square iconbutton"></i>
                                Registrati
                            </button>

                            <hr>
                            <p>Se hai già un account
                                <a href="{{route('login')}}">clicca qui!</a>
                            </p>
                        </form>

                    </div>
                </div>
            </div>

</x-layout>