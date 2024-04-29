<?php

namespace App\Livewire\Admin\Users;

use Livewire\Component;
use App\Models\User;
use App\Models\Purchase;

class UserComponent extends Component
{
    public $search ='';
    public $purchases;

    public function index()
    {
        $purchases = Purchase::with('user')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%');
            })
            ->paginate(10);

        return view('livewire.admin.users.user-component', compact('purchases'));
    }

   // $families = Family::orderBy('id', 'desc')->paginate(10);

    public function render()
    {

        return $this->index();
    }



}
