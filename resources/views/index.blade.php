@extends('layouts.app')

@section('title', 'The List of Tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{ route('tasks.create') }}"
        class="btn">Create Task</a>
    </nav>

    @forelse ($tasks as $task)
        <div>
            <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
                @class(['line-through' => $task->is_completed])>{{ $task->title }}</a>
        </div>
    @empty
        <div>There are no tasks!</div>
    @endforelse


    @if ($tasks->count() > 0)
        <nav class="mt-4">
            {{ $tasks->links() }}
        </nav>

    @endif

@endsection
