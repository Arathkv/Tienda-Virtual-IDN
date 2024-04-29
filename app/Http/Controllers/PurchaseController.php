<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use Gloudemans\Shoppingcart\Facades\Cart;


class PurchaseController extends Controller
{
    public function store(Request $request)
    {
        $user_id = auth()->user()->id;

        foreach (Cart::instance('shopping')->content() as $item) {
            // Crea una nueva entrada en la tabla de compras para cada artículo comprado
            purchase::create([
                'user_id' => $user_id,
                'name' => $item->name,
                'qty' => $item->qty,
                'price' => $item->price,
                'subtotal' => $item->subtotal,
                // Aquí puedes incluir otros campos de la tabla de compras según sea necesario
            ]);
        }

        session()->flash('swal', [
            'icon' => 'success',
            'title' => '¡Felicidades!',
            'text' => 'La compra se realizó correctamente.',
        ]);

        // Lógica adicional como enviar correo electrónico de confirmación, actualizar inventario, etc.

        // Elimina el contenido del carrito después de completar la compra
        Cart::instance('shopping')->destroy();

        // Redirecciona a una página de confirmación u otro destino
        //return redirect()->route('purchase.confirmation');
        return redirect()->route('welcome.index');
    }
}
