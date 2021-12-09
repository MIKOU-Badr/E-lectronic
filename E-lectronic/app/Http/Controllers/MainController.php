<?php

namespace App\Http\Controllers;

use Cart;
use App\Models\Article;
use Illuminate\Http\Request;

class MainController extends Controller
{


    public function index() {
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        $articles = Article::all();
        return view('index', compact('articles','panierTotal','nbrArticle'));
    }

    public function boutique() {
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        $articles = Article::all();
        return view('Boutique', compact('articles','panierTotal','nbrArticle'));
    }

    public function kits(){
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        $articles = Article::all();

        return view('kits', compact('articles','panierTotal','nbrArticle'));
    }

    public function cartes(){
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        $articles = Article::all();
        return view('cartes', compact('articles','panierTotal','nbrArticle'));
    }

    public function accessoires(){
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        $articles = Article::all();
        return view('accessoires', compact('articles','panierTotal','nbrArticle'));
    }

    public function new(){
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        $articles = Article::all();
        return view('new', compact('articles','panierTotal','nbrArticle'));
    }

    public function afficherArticle(Request $request){
        $article = Article::find($request->refArticle);
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();

        $stock = $article->QteDeStock === 0 ? 'En rupture de stock' : 'En stock' ;

        return view('Article', compact('article','panierTotal','nbrArticle', 'stock'));
    }

    public function projet(){
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();
        return view('projets', compact('panierTotal','nbrArticle'));
    }

    public function search(Request $request){

        $article = Article::find($request->refArticle);
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();

        $q=request()->input('q');

        $articles= Article::where('Titre','like',"%$q%")
                ->orwhere('Description','like',"%$q%")
                ->paginate(6);

        return view('Search', compact('article','panierTotal','nbrArticle'))->with('articles',$articles);
    }

}
