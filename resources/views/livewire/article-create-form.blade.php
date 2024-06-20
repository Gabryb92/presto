{{-- <div class="container-fluid"> --}}
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-md-9">
            <form class="p-5 shadow formstilo mb-5" wire:submit.prevent="store" enctype="multipart/form-data">
                @csrf
                @if (session('articleCreated'))
                    <div class="alert alert-warning shadow rounded text-center">
                            {{session('articleCreated')}}
                    </div>
                @endif
                {{-- campi obbligatori --}}
                {{-- @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif --}}
                <div class="mb-4">
                    <label for="title" class="form-label">Titolo:</label>
                    <input type="text" wire:model.Lazy="title" class="form-control @error('title') is-invalid @enderror" id="title">
                    @error('title')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="price" class="form-label">Prezzo:</label>
                    <input type="number" step=".01" wire:model.Lazy="price" class="form-control @error('price') is-invalid @enderror" id="price">
                    @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="category" class="form-label">Scegli la categoria:</label>
                    <select wire:model.defer.Lazy="category" class="grigio form-control @error('category') is-invalid @enderror" id="category">
                        <option value="">Seleziona una categoria</option>
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{($category->name)}}</option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="category" class="form-label">Carica immagini:</label>
                    <input type="file" wire:model="temporary_images" name="images" multiple class="form-control @error('temporary_images.*') is-invalid @enderror">
                    @error('temporary_images.*')
                        <p class="text-danger mt-2">{{ $message }}</p>
                    @enderror
                </div>

                @if(!empty($images))
                    <div class="row">
                        <div class="col-12">
                            <p>Anteprima Immagini</p>
                            <div class="row border border-4 border-info rounded shadow py-4">
                                @foreach ($images as $key => $image)
                                    <div class="col my-3">
                                        <div class="img-preview mx-auto shadow rounded" style="background-image: url({{$image->temporaryUrl()}});"></div>
                                        <button class="btn btn-danger shadow d-block text-center mt-2 mx-auto" type="button" wire:click="removeImage({{$key}})">Cancella</button>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                @endif


                <div class="mb-4">
                    <label for="description" class="form-label">Descrivi brevemente il prodotto:</label>
                    <textarea wire:model.Lazy="description" id="description" cols="30" rows="7" class="form-control @error('description') is-invalid @enderror"></textarea>
                    @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">
                    <i class="fa-solid fa-plus iconbutton"></i>
                    Aggiungi articolo
                </button>
                <a href="{{route('homepage')}}" class="btn btn-success">
                    <i class="fa-solid fa-house iconbutton"></i>
                    Torna alla homepage
                </a>
            </form>
        </div>
    </div>
</div>