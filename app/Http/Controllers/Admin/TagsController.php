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
    public function index(): \Inertia\Response
    {
        $tags = Tag::paginate(5);

        return inertia('Admin/Tags/Index')
            ->with('tags', $tags);
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
            'slug' => Str::slug($request->input('name'))
        ]);

        return redirect()
            ->route('admin.tags.index')
            ->with('flash.banner', 'Tag `'. $tag->name .'` created successfully.');
    }
}
