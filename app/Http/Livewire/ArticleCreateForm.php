<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;
use App\Models\Category;
use App\Jobs\RemoveFaces;
use App\Jobs\ResizeImage;
use App\Jobs\LogoImmagini;
use Livewire\WithFileUploads;
use App\Jobs\GoogleVisionSafeSeach;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class ArticleCreateForm extends Component
{
    use WithFileUploads;
    
    public $title, $description, $price, $category, $temporary_images;
    public $images = [];
    public $article;

    protected $rules = [
        'title' =>'required|min:3',
        'description' =>'required|min:10',
        'price' =>'required|gt:0',
        'category' =>'required',
        'temporary_images.*' => 'image|max:2048',
        'images.*' => 'image|max:2048',

        
    ];

    public $messages = [
        'title.required' => 'Il titolo è obbligatorio',
        'title.min' => 'Servono almeno 3 caratteri',
        'description.required' => 'La descrizione è obbligatoria',
        'description.min' => 'Servono minimo 10 caratteri',
        'price.required' => 'Il prezzo è obbligatorio',
        'price.gt' => 'Il prezzo non può essere 0',
        'category.required' => 'La categoria è obbligatoria',
        'temporary_images.*.image' => 'Il file deve essere una immagine',
        'temporary_images.*.max' => 'L\'immagine non deve essere superiore a 2MB',
        'images.image' => 'Il file deve essere una immagine',
        'images.max' => 'L\'immagine non deve essere superiore a 2MB',
    ];

    public function updatedTemporaryImages(){
        if($this->validate([
            'temporary_images.*' => 'image|max:2048',
        ])){
            foreach ($this->temporary_images as $image){
                //Array Push
                $this->images[] = $image;
            }
        }
    }

    public function removeImage($key){
        if(in_array($key, array_keys($this->images))) {
            unset($this->images[$key]);
        }
    }


    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }

    public function store(){
        
        $this->validate();

        $category = Category::find($this->category);

        $article = $category->articles()->create([

        'title' => $this->title,
        'price' => $this->price,
        'description' => $this->description,
            

            
        ]);
        Auth::user()->articles()->save($article);
        
        if(count($this->images)){
            foreach ($this->images as $image){
                // $article->images()->create(['path' => $image->store('images','public')]);

                $newFileName = "articles/{$article->id}";
                $newImage = $article->images()->create(['path'=>$image->store($newFileName, 
                'public')]);

                RemoveFaces::withChain([
                    new ResizeImage($newImage->path, 300, 300),
                    new GoogleVisionSafeSeach($newImage->id),
                    new GoogleVisionLabelImage ($newImage->id),
                ])->dispatch($newImage->id);
                
            }
            File::deleteDirectory(storage_path('/app/livewire-tmp'));
        }

        session()->flash('articleCreated', 'Annuncio in attesa di conferma');

        $this->reset();

        // $this->validate();

        // $this->article = Category::find($this->category)->articles()->create($this->validate());
        
        

        // $this->article->user()->associate(Auth::user());
        // $this->article->save();

    
    }
    
    public function render()
    {
        $categories = Category::all();
        return view('livewire.article-create-form', compact('categories'));
    }

}
