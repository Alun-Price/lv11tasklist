@section('title', isset($task) ? 'Edit Task' : 'Create Task')


@section('content')

    <form method="POST" action="{{ isset($task) ? route('tasks.update', ['task' => $task->id]) : route('tasks.store') }}">
        @csrf
        @isset($task)
            @method("PUT")
        @endisset
            <div class="form-group mb-4">
                <label for="title">Title</label>
                <input type="text" name="title" id="title"
                    @class(['border-red-500' => $errors->has('title')])
                    placeholder="Add a Task Title"
                    value="{{ $task->title ?? old('title') }}" />
                @error('title')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="description">Description</label>
                <textarea name="description" id="description"
                    @class(['border-red-500' => $errors->has('description')])
                    placeholder="Add a short Task Description"
                    rows="5">{{ $task->description ?? old('description') }}</textarea>
                @error('description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

            <div class="form-group mb-4">
                <label for="long_description">Long Description</label>
                <textarea name="long_description" id="long_description"
                    @class(['border-red-500' => $errors->has('long_description')])
                    placeholder="Add a longer Task Description"
                    rows="10">{{ $task->long_description ?? old('long_description') }}</textarea>
                @error('long_description')
                    <p class="error">{{ $message }}</p>
                @enderror
            </div>

           <div class="flex gap-2">
                <button type="submit" class="btn">
                    @isset($task)
                        Update Task
                    @else
                        Create Task
                    @endisset
                </button>

                <a href="{{ route('tasks.index') }}" class="btn">Cancel</a>
           </div>
    </form>
@endsection
