<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Link;
use Illuminate\Support\Str;

use App\Models\Pix;


use Carbon\Carbon;

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
        $url = new Link;
        $url->name = $request->name;
        $url->pix_id = $request->pix_id;
        $url->target_url = '/checkout/v1/payment/redirect/'.$request->pix_id;
        $url->short_link = Str::random(8);
        $url->expire_at = now()->addDays(5);
        $url->saveOrFail();

        //
        Pix::where('id', $request->pix_id)->update([
            'link_id' => $url->id
        ]);

        return redirect()->route('pix.show', $request->pix_id);
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
    public function redirect(string $short_link)
    {
        //
        $link = Link::where('short_link', '=', $short_link)
        ->where(function ($query) {
            $query->where('expire_at', '>=', Carbon::now())
            ->orWhere('expire_at', '=', null);
        })->first('target_url');

        if (!$link) {
            abort(404);
        } 

        return redirect($link->target_url);
    }
}
