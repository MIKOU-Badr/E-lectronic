<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MAinController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\checkoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Livewire\User\UserDashboardComponent;
use TCG\Voyager\Facades\Voyager ;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [MainController::class, 'index'])->name('index');



Route::get('/index', function() {
    return view('index');
});

Route::get('/accessoires',  [MainController::class, 'accessoires'])->name('Accessoires');

Route::get('/Boutique', [MainController::class, 'boutique'])->name('Boutique');

Route::get('/cartes', [MainController::class, 'cartes'])->name('Cartes');

Route::get('/kits', [MainController::class, 'kits'])->name('Kits');

Route::get('/new', [MainController::class, 'new'])->name('New');

Route::get('/projets', [MainController::class, 'projet'])->name('projets');

Route::get('/Article',[MainController::class, 'afficherArticle'])->name('voirArticle');

Route::post('/panier/Ajouter',[CartController::class, 'ajouterArticle'])->name('ajouterArticle');

Route::get('/panier/Afficher',[CartController::class, 'afficherPanier'])->name('afficherPanier');

Route::post('/panier/Afficher',[CartController::class, 'modifierQuantité'])->name('modifierQuantité');

Route::post('/panier/Supprimer',[CartController::class, 'supprimerArticle'])->name('supprimerArticle');

Route::get('Search/', [MainController::class, 'search'])->name('Search');

//Commandes
Route::get('Commandes/', [checkoutController::class, 'commande'])->name('commande');

//Adresse
Route::get('adresse/', [checkoutController::class, 'adresse'])->name('adresse');
Route::get('updateAdresse/', [checkoutController::class, 'updateAdresse'])->name('updateAdresse');

Route::resource('/wishlist', WishlistController::class)->except([
    'create', 'edit', 'show', 'update'
]);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


//Checkout
Route::get('/paiement', [checkoutController::class, 'index'])->name('checkout.index');
Route::post('/paiement', [checkoutController::class, 'store'])->name('checkout.store');
Route::get('/merci', [checkoutController::class, 'merci'])->name('checkout.thankyou');






Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
