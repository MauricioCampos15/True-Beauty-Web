<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{

    use WithPagination;

    protected $paginationTheme = 'bootstrap'; 
   
    public $search = '';

    public function updatingSearch(){
        $this->resetPage();
    }
 
    public function render()
    {
        $users = User::search($this->search)->paginate();

        return view('livewire.admin.users-index', [
            'users' => $users,
        ]);
    }
}
