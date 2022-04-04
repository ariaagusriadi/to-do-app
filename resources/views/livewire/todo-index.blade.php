<div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session('message') }}
        </div>
    @endif

    @if ($statusUpdate)
        <livewire:todo-update></livewire:todo-update>
    @else
        <livewire:todo-create></livewire:todo-create>
    @endif
    <hr>

    <div class="row">
        <div class="col">
            <select wire:model="paginate" name="" id="" class="form-control form-control-sm w-auto">
                <option value="5">5</option>
                <option value="10">10</option>
                <option value="15">15</option>
            </select>
        </div>

        <div class="col">
            <input wire:model="search" type="text" class="form-control form-control-sm" placeholder="search...">
        </div>
    </div>


    <hr>
    <table class="table">
        <thead class="thead-dark">

            <th class="col">No</th>
            <th class="col">Todo-List</th>
            <th class="col">Action</th>

        </thead>
        <tbody>
            @foreach ($todos as $todo)
                <tr>
                    <th>{{ $loop->iteration }}</th>
                    <td>{{ $todo->name }}</td>
                    <td>
                        <div class="btn-group">
                            <button wire:click="getTodo({{ $todo->id }})" class="btn btn-sm btn-info text-white">Edit</button>
                            <button wire:click="destroy({{ $todo->id }})" class="btn btn-sm btn-danger text-white">Delete</button>
                        </div>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $todos->links() }}
</div>
