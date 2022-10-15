<?php

namespace App\Services\Tmdb\Interfaces;

interface Tmdb
{
    public function endpoint(?string $endpointUrl): self;
    public function parameterPath(?string $parameter): self;
    public function id(string|int $id): self;
    public function apiKey(?string $key): self;
    public function optionalQueryParams(?array $optionalParams): self;
}
