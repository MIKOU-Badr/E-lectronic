<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Cart;

class GuestLayout extends Component
{
    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     */
    public function render()
    {
        $panierTotal=Cart::getTotal();
        $nbrArticle=Cart::getContent()->count();
        return view('layouts.guest', compact('panierTotal', 'nbrArticle'));
    }
}
