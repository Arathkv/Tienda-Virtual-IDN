<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Livewire\Component;

class ShoppingCart extends Component
{
    public function mount()
    {
        Cart::instance('shopping');
    }

    public function decrease($rowId)
    {
        Cart::instance('shopping');
        $item = Cart::get($rowId);

        if ($item->qty > 1) {
            Cart::update($rowId, $item->qty - 1);
        }else{
            Cart::remove($rowId);
        }

        if (auth()->check()) {
            Cart::store(auth()->id());
        }
        $this->dispatch('cartUpdated',  Cart::count());
    }

    public function increase($rowId)
    {
        Cart::instance('shopping');
        Cart::update($rowId, Cart::get($rowId)->qty + 1);

        if (auth()->check()) {
            Cart::store(auth()->id());
        }

        $this->dispatch('cartUpdated',  Cart::count());
    }

    public function remove($rowId)
    {
        Cart::instance('shopping');
        Cart::remove($rowId);

        if (auth()->check()) {
            Cart::store(auth()->id());
        }
        $this->dispatch('cartUpdated',  Cart::count());
    }

    public function destroy()
    {
        Cart::instance('shopping');
        Cart::destroy();

        if (auth()->check()) {
            Cart::store(auth()->id());
        }
        $this->dispatch('cartUpdated',  Cart::count());
    }

    public function redirectToShipping()
    {
        if (Auth::check()) {
            return redirect()->route('shipping.index');
        } else {
            // Aquí puedes manejar la situación cuando el usuario no está autenticado
            // Por ejemplo, puedes mostrar un mensaje de error o redirigirlo a la página de inicio de sesión
            return redirect()->route('login')->with('message', 'Debes iniciar sesión para continuar con la compra.');
        }
    }

    public function render()
    {
        return view('livewire.shopping-cart');
    }
}
