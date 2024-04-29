<x-admin-layout :breadcrumbs="[
    [
        'name' => 'Dashboard',
        'route' => route('admin.dashboard'),
    ],
    [
        'name' => 'Compras',
    ]
]">

    {{--<x-slot name="action">
        <a class="btn btn-blue" href="{{route('admin.categories.create')}}">
            Nuevo
        </a>
    </x-slot> --}}


    @if ($purchases->count())
    <div class="relative overflow-x-auto">

        {{--<div>
            <x-input wire:model="search" type="text" class="w-full" placeholder="Escriba algo para filtrar"/>
        </div>--}}



        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        ID Compra
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Usuario
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Email
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Producto
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Cantidad
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Precio
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Total
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Fecha Compra
                    </th>
                </tr>
            <tbody>
                @foreach ($purchases as $purchase)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$purchase->id}}
                        </th>
                        <td class="px-6 py-4">
                            {{$purchase->user->name}} {{$purchase->user->last_name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$purchase->user->email}}
                        </td>
                        <td class="px-6 py-4">
                            {{$purchase->name}}
                        </td>
                        <td class="px-6 py-4">
                            {{$purchase->qty}}
                        </td>
                        <td class="px-6 py-4">
                            {{$purchase->price}}
                        </td>
                        <td class="px-6 py-4">
                            {{$purchase->subtotal}}
                        </td>
                        <td class="px-6 py-4">
                            {{$purchase->created_at}}
                        </td>
                    </tr>
                @endforeach


            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{$purchases->links()}}
    </div>
@else
    <div class="flex items-center p-4 text-sm text-blue-800 rounded-lg bg-blue-50 dark:bg-gray-800 dark:text-blue-400" role="alert">
        <svg class="flex-shrink-0 inline w-4 h-4 me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
        <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
        </svg>
        <span class="sr-only">Info</span>
        <div>
        <span class="font-medium">Info alert!</span> Todavía no hay compras registradas.
        </div>
    </div>
@endif

@push('js')

    <script>
        function search(value) {
            Livewire.dispatch('search', {
                search: value
            })
        }
    </script>

    @endpush

</x-admin-layout>
