<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('To Do List') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <div class="panel-body">

                        <form action="{{ route('dashboard.store') }}" method="POST" class="form-horizontal">
                            @csrf

                            <div class="form-group">
                                <label for="task-name" class="col-sm-3 control-label">Item</label>

                                <div class="col-sm-6">
                                    <input type="text" name="name" id="task-name" class="form-control"
                                        @required(true)>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="mt-4 ml-3">
                                        <i class="btn btn-success">Add Item</i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        @foreach ($items as $item)
                            <div class="form-group mt-4 d-flex justify-content-between black">
                                <label for="task-name" class="col-sm-3 control-label">{{ $item->name }}</label>
                                <form action="{{ route('status', $item->id) }}" method="post">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit">
                                        <i class="btn btn-{{ $item->completed ? 'warning' : 'success' }}">
                                            {{ $item->completed ? 'Не выполнено' : 'Выполнено' }}
                                        </i>
                                    </button>
                                </form>
                                <form action="{{ route('dashboard.delete', $item->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit">
                                        <i class="btn btn-danger">Delete</i>
                                    </button>
                                </form>
                            </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
