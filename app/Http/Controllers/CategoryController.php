<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;
use Inertia\Response;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(): Response
    {
        $data = Categories::all();
        return Inertia::render('category', ['data' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        Validator::make($request->all(),[
            'name' => ['required'],
            'description' => ['required'],
        ])->validate();

        Categories::query()->create($request->all());
        return redirect()->back()->with('message', 'Category Created Successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws ValidationException
     */
    public function update(Request $request): RedirectResponse
    {
        Validator::make($request->all(), [
            'name' => ['required'],
            'description' => ['required'],
        ])->validate();

        if ($request->has('id')) {
            Categories::query()->find($request->input('id'))->update($request->all());
            return redirect()->back()->with('message', 'Category Updated Successfully.');
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
            Categories::query()->find($request->input('id'))->delete();
            return redirect()->back()->with('message', 'Category Deleted Successfully.');
        }
        return redirect()->back()->with('message', 'Fail!');
    }
}
