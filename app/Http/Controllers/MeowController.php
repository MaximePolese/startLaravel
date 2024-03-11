<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeowController extends Controller
{
    public function allComments(): string
    {
        return view('meows-list');
    }

    public function comment(string $id): string
    {
        return view('meow-details')
            ->with('id', $id);
    }
}
