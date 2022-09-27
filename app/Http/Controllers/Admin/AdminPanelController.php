<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminPanelController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Inertia\ResponseFactory|\Inertia\Response
     */
    public function __invoke(Request $request)
    {
        return inertia('Admin/Index');
    }
}
