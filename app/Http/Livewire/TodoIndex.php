<?php

namespace App\Http\Livewire;

use App\Models\Todo;
use Livewire\Component;
use Livewire\WithPagination;

class TodoIndex extends Component
{

    public $statusUpdate = false;
    public $paginate = 5;
    public $search;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        "todoStored" => "handlestored",
        "todoUpdated" => "handleUpdated"
    ];

    public function render()
    {
        return view('livewire.todo-index', [
            "todos" => $this->search == null ?
            Todo::latest()->paginate($this->paginate) :
            Todo::latest()->where('name', 'like' , '%' . $this->search . '%')->paginate($this->paginate)
        ]);
    }

    public function handlestored()
    {
        session()->flash('message', 'Todo Wass Added!');
    }
    public function handleUpdated()
    {
        session()->flash('message', 'Todo Wass Edit!');
    }

    public function getTodo($id)
    {
        $this->statusUpdate = true;
        $todo = Todo::find($id);
        $this->emit("getTodo", $todo);
    }

    public function destroy($id)
    {
        if ($id) {
            $todo = Todo::find($id);
            $todo->delete();
            session()->flash('message', 'Todo Wass Delete!');
        }
    }

    protected $queryString = ['search'];

    public function mount()
    {
        $this->search = request()->query('search', $this->search);
    }


}
