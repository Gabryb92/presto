<?php

namespace App\Http\Livewire;

use App\Models\Article;
use Livewire\Component;

class ArticleIndex extends Component
{
    public function render()
    {
        $articles = Article::where('is_accepted', true)->get()->sortByDesc('created_at');

        return view('livewire.article-index',compact('articles'));
    }
}
