<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoCreate extends Component
{

    public $name;

    public function render()
    {
        return view('livewire.todo-create');
    }

    public function store(){

        $this->validate([
            'name' => 'required|min:3'
        ]);

        Todo::create([
            'name' => $this->name
        ]);

        $this->resestInput();

        $this->emit('todoStored');
    }

    public function resestInput()
    {
        $this->name = null;
    }
}
