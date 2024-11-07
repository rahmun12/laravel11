<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Book</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }
        .error {
            color: red;
            font-size: 0.9em;
        }
        button {
            padding: 10px 15px;
            background-color: #28a745;
            color: white;
            border: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <h1>Create a New Book</h1>
    <form action="/book/store" method="POST">
        @csrf
        <div class="form-group">
            <label for="code">Kode Buku</label>
            <input type="text" id="code" name="code" value="{{ old('code') }}">
            @error('code')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="name">Nama Buku</label>
            <input type="text" id="name" name="name" value="{{ old('name') }}">
            @error('name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="publisher">Penerbit</label>
            <input type="text" id="publisher" name="publisher" value="{{ old('publisher') }}">
            @error('publisher')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="year">Tahun Terbit</label>
            <input type="text" id="year" name="year" value="{{ old('year') }}">
            @error('year')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label for="author">Penulis</label>
            <input type="text" id="author" name="author" value="{{ old('author') }}">
            @error('author')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit">Submit</button>
    </form>
</body>
</html>
