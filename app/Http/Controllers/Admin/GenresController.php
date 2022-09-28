<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GenresController extends Controller
{
    public function index()
    {
        return inertia('Admin/Genres/Index');
    }
}
