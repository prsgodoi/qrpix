<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Link;
use Illuminate\Support\Str;

use App\Models\Pix;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $links = Pix::findOrFail($id);
        return view('links-down',compact('links'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function redirect($short_link)
    {
        $link = Link::where('short_link', $short_link)->first();

        if (!$link) {
            abort(404);
        } else {
            return redirect()->away(url($link->target_url));
        }
    }
}
