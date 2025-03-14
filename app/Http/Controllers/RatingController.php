<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserRating;
use Illuminate\Support\Facades\File;
use App\Models\Image;

class RatingController extends Controller
{
    // 🟢 Show the form to add a new user
    public function create()
    {
        return view('add-user');
    }

    // 🟢 Handle form submission and add a new user
    public function store(Request $request)
    {
        $request->validate([
            'images.*' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust size as needed
        ]);

        foreach ($request->file('images') as $image) {
            // Store image in the public storage
            $imagePath = $image->store('images', 'public');
            // Save image details to the database
            UserRating::create([
                'name' => $image->getClientOriginalName(),
                'image_url' => "/storage/" . $imagePath, // Public URL path
                'rating' => 1400,
            ]);
        }
        return redirect()->route('add.user')->with('success', 'User added successfully!');
    }

    // 🟠 Show two random users for voting
    public function index()
    {
        $users = UserRating::inRandomOrder()->take(2)->get();
        return view('welcome', compact('users'));
    }

    // 🔴 Handle voting logic
    public function vote(Request $request)
    {
        $winner = UserRating::find($request->winner_id);
        $loser = UserRating::find($request->loser_id);

        if ($winner && $loser) {
            $this->updateElo($winner, $loser);
        }

        return redirect()->route('vote');
    }

    // ⚡ Elo rating calculation
    private function updateElo($winner, $loser, $k = 32)
    {
        $expectedWinner = 1 / (1 + pow(10, ($loser->rating - $winner->rating) / 400));
        $expectedLoser = 1 / (1 + pow(10, ($winner->rating - $loser->rating) / 400));

        $winner->rating += $k * (1 - $expectedWinner);
        $loser->rating += $k * (0 - $expectedLoser);

        $winner->save();
        $loser->save();
    }
    public function leaderboard()
    {
        $faces = UserRating::orderBy('rating', 'desc')->get();
        return view('leaderboard', compact('faces'));
    }
}
