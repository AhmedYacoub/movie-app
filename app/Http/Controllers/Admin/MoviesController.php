<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    public function index()
    {
        return inertia('Admin/Movies/Index');
    }
}
