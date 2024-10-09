<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        return view('home', compact('user'));
    }

    public function search(Request $request)
    {
        $request->validate([
            'nid' => ['required', 'digits_between:10,17']
        ]);

        $nid = $request->input('nid');
        $search = true;

        $user = cache()->remember("user:nid:{$nid}", 60, function () use ($nid) {
            return User::where('nid', $nid)->first();
        });

        return redirect()->back()->with(['user' => $user, 'search' => $search]);
    }
}
