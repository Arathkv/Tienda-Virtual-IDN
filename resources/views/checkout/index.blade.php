<x-app-layout>

    <div class="-mb-16 text-gray-700" x-data="{
        pago: 1
    }">

    {{--Este es el ultimo cambio 02/04/2024--}}

        <div class="grid grid-cols-1 lg:grid-cols-1">

            {{--coluna 1--}}
            {{--<div class="col-span-1 bg-white">
                <div class="lg:max-w-[40rem] py-12 px-4 lg:pr-8 sm:pl-6 lg:pl-8 ml-auto">

                    <h1 class="text-2xl font-semibold mb-2">
                        Pago
                    </h1>

                    <div class="shadow rounded-lg overflow-hidden border border-gray-400">
                        <ul class="divide-y divide-gray-400">
                            <li>
                                <label class="p-4 flex items-center">
                                    <input type="radio" x-model="pago" value="1">

                                    <span class="ml-2">
                                        Tarjeta de debito / crédito
                                    </span>

                                    <img class="h-12 ml-auto" src="https://aviacion.edu.co/wp-content/uploads/2023/03/tarjetas-credito-logos.png">

                                </label>

                                <div class="p-4 bg-gray-100 text-center border-t border-gray-400"
                                    x-show="pago == 1">
                                    <i class="fa-regular fa-credit-card text-6xl"></i>

                                    <p class="mt-2">
                                        Luego de hacer click en "Pagar ahora" para hacer el pago.
                                    </p>
                                </div>
                            </li>

                            <li>

                                <label class="p-4 flex items-center">

                                    <input type="radio" x-model="pago" value="2">

                                    <span class="ml-2">
                                        Deposito por Paypal
                                    </span>

                                </label>

                                <div class="p-4 bg-gray-100 flex justify-center border-t border-gray-400"
                                    x-cloak x-show="pago == 2">

                                    <div>
                                        <p>1. Pago por depósito o transferencia bancaria: </p>
                                        <p>- BBVA: 3544-33442335-2233 </p>
                                        <p>2.- Pago por Oxxo</p>
                                        <p>- Oxxo 3544-33442335-2233</p>
                                        <p>3.- Pago por Paypal</p>
                                        <p>- Paypal 3544-33442335-2233, numero de confirmacion (2343)</p>
                                        <p>Enviar el comprobante de pago a 917 110 0252</p>
                                    </div>

                                </div>

                            </li>
                        </ul>
                    </div>

                </div>
            </div>--}}


            {{--coluna 2--}}
            <div class="col-span-1 lg:col-span-1 flex justify-center">
                <div class="lg:max-w-[40rem] py-12 px-4 lg:pl-8 sm:pr-6 lg:pr-8">
                    <form action="{{ route('guardarCompra' )}}" method="POST">
                        @csrf


                    <ul class="space-y-4">
                        @foreach (Cart::instance('shopping')->content() as $item)

                            <li class="flex items-center space-x-4">

                                <div class="flex-shrink-0 relative">
                                    <img class="h-24 aspect-square" src="{{$item->options->image}}" alt="">

                                    <div class="flex justify-center items-center h-6 w-6 bg-gray-900 bg-opacity-70 rounded-full absolute -right-2 -top-2">
                                        <span class="text-white font-semibold">
                                            {{$item->qty}}
                                        </span>
                                    </div>
                                </div>

                                <div class="flex-1">
                                    <p>
                                        {{$item->name}}
                                    </p>
                                </div>

                                <div class="flex-shrink-0">
                                    <p>
                                        MX/. {{$item->price}}
                                    </p>
                                </div>

                            </li>

                        @endforeach
                    </ul>

                    <div class="flex justify-between">
                        <p>
                            Subtotal
                        </p>

                        <p>
                            MX/. {{Cart::instance('shopping')->Subtotal()}}
                        </p>
                    </div>

                    <div class="flex justify-between">
                        <p>
                            Precio de envio

                            <i class="fas fa-info-circle" title="Gratis "></i>
                        </p>

                        <p>
                            Gratis
                        </p>
                    </div>

                    <hr class="my-3">

                    <div class="flex justify-between mb-4">
                        <p class="text-lg font-semibold">
                            Total
                        </p>

                        <p>
                            MX/. {{Cart::instance('shopping')->Subtotal()}}
                        </p>

                    </div>

                    <div>
                        <button type="submit" class="btn w-full" style="background-color:#9a2edb; color:white">
                            Finalizar pedido
                        </button>
                    </div>

                </form>

                </div>
            </div>

        </div>



    </div>

</x-app-layout>
