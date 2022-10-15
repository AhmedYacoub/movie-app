<?php

namespace App\Services\Tmdb;

use Illuminate\Support\Facades\Http;
use App\Services\Tmdb\Interfaces\Tmdb;
use App\Services\Tmdb\Interfaces\Getable;

/**
 * Call TMDB person/actor API endpoint using some parameters.
 * This class built with builder design-pattern.
 *
 * for more info about TMDB API documentation => https://www.themoviedb.org/settings/api
 * and TMDB person/actor API => https://developers.themoviedb.org/3/people/get-person-details
 */
class TmdbPerson implements Tmdb, Getable
{
    /**
     * Initial TMDB API endpoint.
     *
     * @var string
     */
    protected $endpoint;

    /**
     * 2nd url segment. i.e http://.../person
     *
     * @var mixed
     */
    protected $parameterPath;

    /**
     * Cast actor TMDB-id
     *
     * @var mixed
     */
    protected $id;

    /**
     * TMDB API secret-key.
     *
     * @var mixed
     */
    protected $apiKey;


    /**
     * Optional query parameters to be appended to full URL.
     *
     * @var mixed
     */
    protected $optionalQueryParams;


    /**
     * Final and valid API URL to be called to get person/actor data.
     *
     * @var mixed
     */
    protected $url;

    public function __construct()
    {
        $this->endpoint = config('services.tmdb.endpoint');
        $this->parameterPath = 'person';
        $this->apiKey = '?api_key=' . config('services.tmdb.secret');
    }

    /**
     * Add TMDB API url.
     *
     * @param  mixed $endpointUrl
     * @return self
     */
    public function endpoint(?string $endpointUrl): self
    {
        $this->endpoint = $endpointUrl;

        return $this;
    }

    /**
     * Add TMDB API parameter-path. like: person, movies, genres..
     *
     * @param  mixed $parameter
     * @return self
     */
    public function parameterPath(?string $parameter): self
    {
        $this->parameterPath = $parameter;

        return $this;
    }

    /**
     * Add TMDB API ID of person.
     *
     * @param  mixed $id
     * @return self
     */
    public function id(string|int $id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Add TMDB secret API key.
     *
     * @param  mixed $key
     * @return self
     */
    public function apiKey(?string $key): self
    {
        $this->apiKey = '?api_key=' . $key;

        return $this;
    }

    /**
     * Add optional query parameters to API url.
     *
     * @param  mixed $optionalParams
     * @return self
     */
    public function optionalQueryParams(?array $optionalParams): self
    {
        if (count($optionalParams)) {
            foreach ($optionalParams as $key => $value) {
                $this->optionalQueryParams .= '&' . $key . '=' . $value;
            }
        }

        return $this;
    }

    /**
     * Execute \Illuminate\Support\Facades\Http::get() with valid url.
     *
     * @return Illuminate\Http\Client\Response
     */
    public function get(): \Illuminate\Http\Client\Response
    {
        $this->normalizeUrl();

        return Http::get($this->url);
    }

    /**
     * Concatenate class properties into a single stringed URL.
     *
     * @return void
     */
    private function normalizeUrl(): void
    {
        $this->url = $this->endpoint
            . $this->parameterPath
            . '/' . $this->id
            . $this->apiKey
            . $this->optionalQueryParams;
    }

    public function getUrl()
    {
        $this->normalizeUrl();
        return $this->url;
    }
}
