<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TvShowsController extends Controller
{
    public function index()
    {
        return inertia('Admin/TvShows/Index');
    }
}
