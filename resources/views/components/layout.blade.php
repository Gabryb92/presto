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

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-9">
                        @if(session('emailRevisor'))
                            <div class="alert alert-success">
                                {{session('emailRevisor')}}
                            </div>
                        @endif
                    </div>
        
                </div>
            </div>

            <div>
                {{$slot}}
            </div>
            
        <x-footer />

        @livewireScripts
    </body>
</html>