<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Leaderboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .leaderboard-container {
            max-width: 800px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
        }
        img {
            border-radius: 10px;
        }
    </style>
</head>
<body>

<div class="container leaderboard-container">
    <h2 class="text-center mb-4">Leaderboard</h2>
    <table class="table table-striped text-center">
        <thead>
            <tr>
                <th>Rank</th>
                <th>Image</th>
                <th>Name</th>
                <th>Rating</th>
            </tr>
        </thead>
        <tbody>
            @foreach($faces as $index => $face)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td><img src="{{ url($face->image_url) }}" alt="{{ $face->name }}" width="80"></td>
                <td>{{ $face->name }}</td>
                <td>{{ $face->rating }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>