<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Mail\BecomeRevisor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Artisan;

class RevisorController extends Controller
{
    public function index(){
        $article_to_check = Article::where('is_accepted', null)->first();
        
        return view('revisor.index', compact('article_to_check'));
    }

    

    public function acceptArticle(Article $article){
        $article->setAccepted(true);
        return redirect()->back()->with('articleAccepted','Hai accettato questo annuncio');
    }

    public function rejectArticle(Article $article){
        $article->setAccepted(false);
        return redirect()->back()->with('articleReject','Hai rifiutato questo annuncio');
    }

    public function becomeRevisor(){
        Mail::to('admin@presto.it')->send(new BecomeRevisor(Auth::user()));
        return redirect('/')->with('emailRevisor','Hai richiesto con successo di diventare un revisore');
    }

    public function makeRevisor(User $user){
        Artisan::call('presto:makeUserRevisor',["email" => "$user->email"]);
        return redirect('/')->with('revisorAccept','Complimenti l\'utente è diventato un revisore');
    }

    public function restoreArticle()
    {
        //$articles = Article::where('is_accepted', false)->all();
        $articles = Article::where('is_accepted', 0)->get();
        // $articles = Article::where('is_accepted', false);
        // $articles = Article::all()->sortByDesc('created_at');

        return view('revisor.restore',compact('articles')); 
    }
}
