<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $task->title }}</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fb;
        }

        .container {
            max-width: 700px;
            margin: 50px auto;
            padding: 30px;
            background: white;
            border-radius: 12px;
        }

        .status {
            display: inline-block;
            padding: 6px 12px;
            border-radius: 20px;
            background: #e5e7eb;
            margin-bottom: 20px;
        }

        .completed {
            background: #dcfce7;
            color: #166534;
        }

        .pending {
            background: #fef3c7;
            color: #92400e;
        }

        .description {
            color: #4b5563;
            line-height: 1.7;
        }

        .buttons {
            margin-top: 30px;
            display: flex;
            gap: 10px;
        }

        a {
            padding: 11px 17px;
            border-radius: 8px;
            text-decoration: none;
            background: #e5e7eb;
            color: #111827;
        }

        .primary {
            background: #4f46e5;
            color: white;
        }
    </style>
</head>

<body>

<div class="container">

    @if ($task->completed)
        <span class="status completed">Completed</span>
    @else
        <span class="status pending">Pending</span>
    @endif

    <h1>{{ $task->title }}</h1>

    <div class="description">
        {{ $task->description ?: 'No description provided.' }}
    </div>

    <div class="buttons">

        <a href="{{ route('tasks.index') }}">
            Back
        </a>

        <a
            href="{{ route('tasks.edit', $task) }}"
            class="primary"
        >
            Edit Task
        </a>

    </div>

</div>

</body>
</html>