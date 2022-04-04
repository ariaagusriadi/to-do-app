<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;

class TodoUpdate extends Component
{
    public $name ;
    public $todoId;

    protected $listeners = [
        "getTodo" => "showTodo"
    ];


    public function render()
    {
        return view('livewire.todo-update');
    }

    public function showTodo($todo){
        $this->name = $todo['name'];
        $this->todoId = $todo['id'];
    }

    public function update()
    {
        $this->validate([
            'name' => 'required|min:3'
        ]);


        if($this->todoId){
            $todo = Todo::find($this->todoId);
            $todo->update([
                'name' => $this->name
            ]);

            $this->resestInput();
            $this->emit('todoUpdated' , $todo);
        }

    }


    public function resestInput()
    {
        $this->name = null;
    }
}
