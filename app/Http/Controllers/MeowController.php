<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MeowController extends Controller
{
    public function allComments(): string
    {
        return 'Liste des messages';
    }

    public function comment(string $id): string
    {
        return 'Message ' . $id;
    }
}
