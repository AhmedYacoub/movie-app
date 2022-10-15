<?php

namespace App\Http\Controllers\Admin;

use App\Models\Cast;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Tmdb\TmdbPerson;
use Http;
use Str;

class CastsController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'search' => ['nullable', 'string', 'max:190'],
            'perPage' => ['nullable', 'integer', 'in:5,10,15'],
            'orderBy' => ['nullable', 'string', 'in:ASC,DESC'],
        ]);

        $search = $request->query('search');
        $perPage = $request->query('perPage') ?: 5;
        $orderBy = $request->query('orderBy') ?: 'ASC';

        $cast = Cast::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($orderBy, function ($query, $orderBy) {
                $query->orderBy('id', $orderBy);
            })
            ->paginate($perPage)
            ->withQueryString();

        return inertia('Admin/Cast/Index', [
            'cast' => $cast,
            'filters' => $request->only('search', 'perPage', 'orderBy')
        ]);
    }

    public function show(Request $request, Cast $cast)
    {
        return inertia('Admin/Cast/Show')
            ->with('cast', $cast);
    }

    public function store(Request $request)
    {
        $request->validate([
            'tmdb_id' => ['required', 'string', 'unique:casts,tmdb_id']
        ], [
            'tmdb_id.required' => 'The provided Cast TMDB ID is required.',
            'tmdb_id.unique' => 'The provided Cast TMDB ID is already exist.',
        ]);

        $tmdbRequest = (new TmdbPerson)
            ->id($request->input('tmdb_id'))
            ->optionalQueryParams(['language' => 'en-US'])
            ->get();

        if (! $tmdbRequest->successful()) {
            return redirect()->route('admin.cast.index')
                ->with('flash.banner', 'The API request sent to TMDB has been failed.');
        }

        $castData = $tmdbRequest->json();

        $cast = Cast::create([
            'tmdb_id' => $castData['id'],
            'name' => $castData['name'],
            'slug' => Str::slug($castData['name']),
            'poster_path' => $castData['profile_path']
        ]);

        return redirect()
            ->route('admin.cast.index')
            ->with('flash.banner', 'Cast generated successfully.');
    }

    public function edit(Cast $cast)
    {
        return inertia('Admin/Cast/Edit')
            ->with('cast', $cast);
    }

    public function update(Request $request, Cast $cast)
    {
        return redirect()->route('admin.cast.index');
    }

    public function destroy(Cast $cast)
    {
        return redirect()->route('admin.cast.index')
            ->with('flash.banner', 'Cast member deleted successfully.');
    }
}
