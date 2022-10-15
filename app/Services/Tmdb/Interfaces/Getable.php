<?php

namespace App\Services\Tmdb\Interfaces;


interface Getable
{
    public function get(): \Illuminate\Http\Client\Response;
}
