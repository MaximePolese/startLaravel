<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Meow;
use App\Http\Requests\StoreMeowRequest;
use App\Http\Requests\UpdateMeowRequest;
use App\Models\User;
use Illuminate\View\View;

class MeowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $meows = Meow::with('user', 'comments')->get();
        return view('dashboard', compact('meows'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMeowRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Meow $meow)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Meow $meow)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMeowRequest $request, Meow $meow)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Meow $meow)
    {
        //
    }
}
