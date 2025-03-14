<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Who is More Attractive?</title>

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        /* Loading overlay styles */
        #loading-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            display: flex;
            justify-content: center;
            align-items: center;
            display: none;
            z-index: 1050;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Loading Screen with Spinner -->
    <div id="loading-overlay">
        <div class="text-center">
            <div class="spinner-border text-light" role="status" style="width: 4rem; height: 4rem;"></div>
        </div>
    </div>

    <div class="container text-center mt-5">
        <h1 class="mb-4">Who is More Attractive?</h1>
        
        <div class="row justify-content-center">
            @foreach($users as $user)
                <div class="col-md-4 col-sm-6 mb-4">
                    <div class="card shadow-sm">
                        <div class="card-body text-center">
                            <img src="{{ $user->image_url }}" class="img-fluid rounded mb-3" alt="User Image">
                            <form class="vote-form" action="{{ route('submit.vote') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-primary w-100" name="winner_id" value="{{ $user->id }}">Vote</button>
                                <input type="hidden" name="loser_id" value="{{ $users->where('id', '!=', $user->id)->first()->id }}">
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Show loading screen with spinner when submitting a vote
        document.querySelectorAll('.vote-form').forEach(form => {
            form.addEventListener('submit', function() {
                document.getElementById('loading-overlay').style.display = 'flex';
            });
        });
    </script>

</body>
</html>
