<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>

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

        h1 {
            margin-top: 0;
        }

        label {
            display: block;
            margin: 18px 0 8px;
            font-weight: bold;
        }

        input,
        textarea {
            width: 100%;
            padding: 12px;
            border: 1px solid #d1d5db;
            border-radius: 8px;
            font-size: 15px;
        }

        textarea {
            min-height: 150px;
            resize: vertical;
        }

        .error {
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
        }

        .buttons {
            margin-top: 25px;
            display: flex;
            gap: 10px;
        }

        button,
        a {
            padding: 11px 17px;
            border-radius: 8px;
            border: none;
            text-decoration: none;
            cursor: pointer;
        }

        button {
            background: #4f46e5;
            color: white;
        }

        a {
            background: #e5e7eb;
            color: #111827;
        }
    </style>
</head>

<body>

<div class="container">

    <h1>Create Task</h1>

    <form action="{{ route('tasks.store') }}" method="POST">

        @csrf

        <label for="title">Title</label>

        <input
            type="text"
            id="title"
            name="title"
            value="{{ old('title') }}"
            placeholder="Enter task title"
        >

        @error('title')
            <div class="error">{{ $message }}</div>
        @enderror

        <label for="description">Description</label>

        <textarea
            id="description"
            name="description"
            placeholder="Enter task description"
        >{{ old('description') }}</textarea>

        @error('description')
            <div class="error">{{ $message }}</div>
        @enderror

        <div class="buttons">
            <button type="submit">Create Task</button>

            <a href="{{ route('tasks.index') }}">
                Cancel
            </a>
        </div>

    </form>

</div>

</body>
</html>