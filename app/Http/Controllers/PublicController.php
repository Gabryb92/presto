<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Builder\Function_;
use PhpParser\Node\Expr\FuncCall;

class PublicController extends Controller
{
    public function homepage(){

        $articles = Article::where('is_accepted', true)->get()->sortByDesc('created_at')->take(4);

        return view('welcome', compact('articles'));
    }

    public function categoriesShow(Category $category){

        return view('categories.show', compact('category'));
    }

    public function searchArticles(Request $request){

        $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);

        return view('article.search', compact('articles'));
    }

    public function setLanguage($lang){

        session()->put('locale', $lang);
        
        return redirect()->back();
    }
}
