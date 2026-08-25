@extends('layouts.app')

@section('title', 'Tasks')

@section('content')

    {{-- Page Header --}}
    <div style="
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 25px;
        gap: 20px;
        flex-wrap: wrap;
    ">
        <div>
            <h1 style="margin-bottom: 5px;">Task Manager</h1>
            <p style="margin: 0; color: #6b7280;">
                Manage your tasks with Laravel.
            </p>
        </div>

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">
            + New Task
        </a>
    </div>


    {{-- Statistics --}}
    <div style="
        display: flex;
        gap: 15px;
        margin-bottom: 25px;
        flex-wrap: wrap;
    ">

        <div class="card" style="flex: 1; min-width: 180px;">
            <div style="color: #6b7280; font-size: 14px;">
                Total Tasks
            </div>

            <h2 style="margin: 8px 0 0;">
                {{ $totalTasks }}
            </h2>
        </div>


        <div class="card" style="flex: 1; min-width: 180px;">
            <div style="color: #6b7280; font-size: 14px;">
                Completed
            </div>

            <h2 style="margin: 8px 0 0;">
                {{ $completedTasks }}
            </h2>
        </div>


        <div class="card" style="flex: 1; min-width: 180px;">
            <div style="color: #6b7280; font-size: 14px;">
                Pending
            </div>

            <h2 style="margin: 8px 0 0;">
                {{ $pendingTasks }}
            </h2>
        </div>

    </div>


    {{-- Task List --}}
    @if ($tasks->isEmpty())

        <div class="card" style="text-align: center;">

            <h2>No tasks yet</h2>

            <p style="color: #6b7280;">
                Create your first task to get started.
            </p>

            <a href="{{ route('tasks.create') }}" class="btn btn-primary">
                Create Task
            </a>

        </div>

    @else

        @foreach ($tasks as $task)

            <div class="task">

                {{-- Task Information --}}
                <div style="flex: 1;">

                    @if ($task->completed)

                        <span class="badge badge-completed">
                            Completed
                        </span>

                    @else

                        <span class="badge badge-pending">
                            Pending
                        </span>

                    @endif


                    <h3 class="{{ $task->completed ? 'completed' : '' }}">
                        {{ $task->title }}
                    </h3>


                    @if ($task->description)

                        <p>
                            {{ $task->description }}
                        </p>

                    @else

                        <p style="color: #9ca3af;">
                            No description provided.
                        </p>

                    @endif

                </div>


                {{-- Actions --}}
                <div class="actions">

                    {{-- View --}}
                    <a
                        href="{{ route('tasks.show', $task) }}"
                        class="btn btn-secondary"
                    >
                        View
                    </a>


                    {{-- Edit --}}
                    <a
                        href="{{ route('tasks.edit', $task) }}"
                        class="btn btn-secondary"
                    >
                        Edit
                    </a>


                    {{-- Complete / Undo --}}
                    <form
                        action="{{ route('tasks.toggle', $task) }}"
                        method="POST"
                    >
                        @csrf

                        @method('PATCH')

                        <button
                            type="submit"
                            class="btn btn-success"
                        >
                            {{ $task->completed ? 'Undo' : 'Complete' }}
                        </button>
                    </form>


                    {{-- Delete --}}
                    <form
                        action="{{ route('tasks.destroy', $task) }}"
                        method="POST"
                        onsubmit="return confirm('Are you sure you want to delete this task?')"
                    >
                        @csrf

                        @method('DELETE')

                        <button
                            type="submit"
                            class="btn btn-danger"
                        >
                            Delete
                        </button>
                    </form>

                </div>

            </div>

        @endforeach

    @endif

@endsection