<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use Cart;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct() {
        $this->middleware(['auth']);
    }

    public function index()
    {
        //
        $user = Auth::user();
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();

        $wishlists = Wishlist::where("user_id", "=", $user->id)->orderby('id', 'desc')->paginate(10);

        return view('wishlist', compact('nbrArticle', 'panierTotal', 'wishlists'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, array(
            'article_id' =>'required',
           ));

           $status=Wishlist::where('user_id',Auth::user()->id)
                                ->where('article_id',$request->article_id)
                                ->first();

           if(isset($status->user_id) and isset($request->article_id))
            {
                return redirect()->back()->with('flash_message', 'Cet Article exist déjà dans le wishlist !');
            }
            else
            {

                $wishlist = new Wishlist;
                $wishlist->user_id = Auth::id();
                $wishlist->article_id = $request->article_id;
                $wishlist->save();

                return redirect()->back()->with('flash_message', 'Article ajouté au wishlist !');
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $wishlist = Wishlist::findOrFail($id);
        $wishlist->delete();
        return redirect()->back()->with('flash_message',
        'Article, "'. $wishlist->article->Titre.'" Supprimé de votre wishlist.');
    }
}
