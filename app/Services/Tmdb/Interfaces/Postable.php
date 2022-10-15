<?php

namespace App\Services\Tmdb\Interfaces;

interface Postable
{
    public function post(): \Illuminate\Http\Client\Response;
}
