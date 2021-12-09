<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Order;
use Cart;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;
use Stripe\Stripe;
use \Stripe\PaymentIntent;

class checkoutController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        if (Cart::getContent()->count()  <= 0) {
            return redirect()->route('Boutique');
        }

        Stripe::setApiKey('sk_test_51IE2e0HqCuWYTxAV7JT1xnbtZzu8LJgX3No0GEd707lgRgSMCqJb3GXbUmAFXT6Uef86XEwnoBQRB23F4gXv1dOD00kvjQ3tdY');


        $intent = PaymentIntent::create([
            'amount' =>round(Cart::getTotal()),
            'currency' => 'eur',
            // Verify your integration in this guide by including this parameter
            'metadata' => ['integration_check' => 'accept_a_payment',
                            'user_id' => Auth::user()->id,
                            ],
        ]);

        $clientSecret = Arr::get($intent, 'client_secret');
        return view('checkout.index', [
            'client_secret' => $clientSecret,
            'panierTotal'   => Cart::getTotal(),
            'panier'        => Cart::getContent(),
            'nbrArticle'    => Cart::getContent()->count()
        ]);
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
    public function merci()
    {
        //
        $panierTotal=Cart::getTotal();
        $panier=Cart::getContent();
        $nbrArticle=$panier->count();

        return Session::has('success') ? view('checkout.thankyou', compact('nbrArticle', 'panierTotal')): redirect()->route('Boutique');
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
        if($this->checkIfNotAvailable()){
            Session::flash('success', 'Un article du panier n\'est plus disponible');
            return response()->json(['success' => false], 400);
        }
        $data = $request->json()->all();

        $order = new Order();
        $order->payment_intent_id = $data['paymentIntent']['id'];
        $order->amount = $data['paymentIntent']['amount'];

        $order->payment_created_at = (new DateTime())->setTimestamp($data['paymentIntent']['created'])->format('Y-m-d H:i:s');
        $order->payment_intent_id = $data['paymentIntent']['id'];

        $articles = [];
        $i = 0;
        foreach (Cart::getContent() as $article) {
            $articles['article_'. $i][] = $article->name;
            $articles['article_'. $i][] = $article->price;
            $articles['article_'. $i][] = $article->quantity;

            $i++;
        }

        $order->articles = serialize($articles);
        $order->user_id = Auth::user()->id;
        $order->save();

        if ($data['paymentIntent']['status']  === 'succeeded') {

           $this->updateStock();
            $items = Cart::getContent();
            foreach ($items as $item) {
                Cart::remove($item->id);
            }

            Session::flash('success', 'Votre commande a été traitée avec succès .');
            return response()->json(['success' => 'Paiement effectué avec succès .  ']);
        } else {
            return response()->json(['success' => 'Paiement non effectué !  ']);
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

    public function commande(){

        $i = 1;
        $user = Auth::user();
        $order = Order::where("user_id", "=", $user->id)->orderby('id', 'asc')->paginate(10);
        
        $panierTotal=Cart::getTotal();
        $nbrArticle=Cart::getContent()->count();
        return view('commande', compact('order', 'nbrArticle', 'panierTotal', 'i'));
    }
    public function adresse(){
        $panierTotal=Cart::getTotal();
        $nbrArticle=Cart::getContent()->count();
        return view('adresse', compact('nbrArticle', 'panierTotal'));
    }

    private function checkIfNotAvailable(){
        foreach(Cart::getContent() as $item){
            $article = Article::find($item->id);

            if($article->QteDeStock < $item->quantity){
                return true;
            }
        }
        return false;
    }

    private function updateStock(){

        foreach(Cart::getContent() as $item){
            $article = Article::find($item->id);

            $article->update(['QteDeStock'=> $article->QteDeStock - $item->quantity]);
        }

    }

    public function updateAdresse(Request $request ){
        $user = Auth::user();
        $user->adresse = $request->adresse;

        $user->save();

        return redirect()->route('adresse');
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
    }
}
