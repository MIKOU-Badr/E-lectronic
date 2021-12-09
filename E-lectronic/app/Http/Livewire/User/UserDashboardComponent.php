<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use App\Models\Order;
use Cart;
use App\Models\Article;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session ;
use Stripe\Stripe;
use \Stripe\PaymentIntent;

class UserDashboardComponent extends Component
{

    public function render()
    {
        return view('livewire.user.user-dashboard-component')->layout('layouts\app');
    }
}
