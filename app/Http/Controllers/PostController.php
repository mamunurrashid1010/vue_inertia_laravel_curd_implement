<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
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

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(),[
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        Post::query()->create($request->all());
        return redirect()->back()->with('message', 'Post Created Successfully.');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'title' => ['required'],
            'body' => ['required'],
        ])->validate();

        if ($request->has('id')) {
            Post::find($request->input('id'))->update($request->all());
            return redirect()->back()->with('message', 'Post Updated Successfully.');
        }
        return redirect()->back()->with('message', 'Fail!');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function destroy(Request $request): RedirectResponse
    {
        if ($request->has('id')) {
            Post::query()->find($request->input('id'))->delete();
            return redirect()->back()->with('message', 'Post Deleted Successfully.');
        }
        return redirect()->back()->with('message', 'Fail!');
    }

}
