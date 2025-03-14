<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Entry (DEV)</title>
</head>
<body>
    <h1>Add new entry</h1>

    <!-- Show success message -->
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <form action="{{ route('store.user') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="image_url">Image URL:</label>
        <input type="file" name="images[]" multiple>
        <br><br>
        <button type="submit">Add User</button>
    </form>
</body>
</html>
