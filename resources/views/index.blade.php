@extends('layouts.app')

@section('title', 'The list of tasks')

@section('content')
    <nav class="mb-4">
        <a href="{{route('tasks.create')}}" class="link">Add Task</a>
    </nav>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <h2 class="text-lg font-semibold mb-2">To Do</h2>
            <div class="min-h-[200px]">
                @forelse ($tasks->where('completed', false) as $task)
                    <div class="bg-white rounded shadow p-4 mb-2 flex items-center justify-between">
                        <a href="{{route('tasks.show', ['task' => $task->id])}}" class="hover:underline">
                            {{$task->title}}
                        </a>
                        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="cursor-pointer">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                @empty
                    <div>No tasks to do!</div>
                @endforelse
            </div>
        </div>

        <div>
            <h2 class="text-lg font-semibold mb-2">Completed</h2>
            <div class="min-h-[200px]">
                @forelse ($tasks->where('completed', true) as $task)
                    <div class="bg-white rounded shadow p-4 mb-2 flex items-center justify-between line-through">
                        <a href="{{route('tasks.show', ['task' => $task->id])}}" class="hover:underline">
                            {{$task->title}}
                        </a>
                        <form method="POST" action="{{ route('tasks.toggle-complete', ['task' => $task->id]) }}">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="cursor-pointer">
                                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                            </button>
                        </form>
                    </div>
                @empty
                    <div>No completed tasks!</div>
                @endforelse
            </div>
        </div>
    </div>

    @if ($tasks->count())
        <nav class='mt-4'>{{$tasks->links()}}</nav>
    @endif
@endsection
