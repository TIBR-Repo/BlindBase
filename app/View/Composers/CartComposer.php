<?php

namespace App\View\Composers;

use Illuminate\View\View;

class CartComposer
{
    /**
     * Bind data to the view.
     */
    public function compose(View $view): void
    {
        $cart = session('cart', []);
        $cartCount = array_sum(array_column($cart, 'quantity'));
        
        $view->with('cartCount', $cartCount);
    }
}
