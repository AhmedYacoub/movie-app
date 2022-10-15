<?php

namespace App\Http\Controllers\Admin;

use Str;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagsController extends Controller
{
    /**
     * index
     *
     * @return Inertia\Response
     */
    public function index(Request $request): \Inertia\Response
    {
        $request->validate([
            'search' => ['nullable', 'string', 'max:190'],
            'perPage' => ['nullable', 'integer'],
            'orderBy' => ['nullable', 'string', 'in:ASC,DESC']
        ]);

        $search = $request->query('search');
        $perPage = $request->query('perPage') ?: 5;
        $orderBy = $request->query('orderBy') ?: 'ASC';

        $tags = Tag::query()
            ->when($search, function ($query, $search) {
                $query->where('name', 'like', "%{$search}%");
            })
            ->when($orderBy, function ($query, $orderBy) {
                $query->orderBy('id', $orderBy);
            })
            ->paginate($perPage)
            ->withQueryString();

        return inertia('Admin/Tags/Index', [
            'tags' => $tags,
            'filters' => $request->only('search', 'perPage', 'orderBy'),
        ]);
    }

    /**
     * show
     *
     * @param  Tag $tag
     * @return Inertia\Response
     */
    public function show(Tag $tag): \Inertia\Response
    {
        return inertia('Admin/Tags/Show')->with('tag', $tag);
    }

    /**
     * create
     *
     * @return Inertia\Response
     */
    public function create(): \Inertia\Response
    {
        return inertia('Admin/Tags/Create');
    }

    /**
     * store
     *
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:190', 'unique:tags']
        ], [
            'name.required' => 'tag name field is required.',
            'name.unique' => 'the provided tag name already exists.',
            'name.max' => 'the provided tag name length is too long.'
        ]);

        $tag = Tag::create([
            'name' => $request->input('name'),
            'slug' => $request->input('name'),
        ]);

        return redirect()
            ->route('admin.tags.index')
            ->with('flash.banner', 'Tag `' . $tag->name . '` created successfully.');
    }

    /**
     * edit
     *
     * @param  mixed $tag
     * @return Inertia\Response
     */
    public function edit(Tag $tag): \Inertia\Response
    {
        return inertia('Admin/Tags/Edit', [
            'tag' => $tag
        ]);
    }

    public function update(Request $request, Tag $tag): \Illuminate\Http\RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:190', 'unique:tags,name,' . $tag->id]
        ], [
            'name.required' => 'tag name field is required.',
            'name.unique' => 'the provided tag name already exists.',
            'name.max' => 'the provided tag name length is too long.'
        ]);

        $sanitizedTagName = strip_tags($request->input('name'));

        $tag->update([
            'name' => $sanitizedTagName,
            'slug' => $sanitizedTagName,
        ]);

        return redirect()
            ->route('admin.tags.index')
            ->with('flash.banner', 'Tag updated successfully.');
    }

    public function destroy(Tag $tag): \Illuminate\Http\RedirectResponse
    {
        $tag->delete();
        return redirect()
            ->route('admin.tags.index')
            ->with('flash.banner', 'Tag deleted successfully.');
    }
}
