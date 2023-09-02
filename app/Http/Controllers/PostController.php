<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;

class PostController extends Controller
{
    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function index(): Response
    {
        $data = Post::all();
        return Inertia::render('posts', ['data' => $data]);
    }
}
