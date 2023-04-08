<?php

namespace App\Http\Controllers;

use App\Models\Pix;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Illuminate\Http\Request;
use Storage;

class PixController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('qrcode');
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
        $pix = new Pix;
        $pix->name = $request->input('name');
        $pix->pix = $request->pix;
        $pix->total = $request->total;

        $qr = QrCode::format('png')->size(500)->generate($pix->pix);
        $fileName = 'payment_qrcode_'.uniqid(time()).'.png';
        $file = public_path('qrcode/'.$fileName);
        file_put_contents($file,$qr);
        $qrPatch = asset('qrcode/'.$fileName);

        $pix->qrcode_path = $qrPatch;

        $pix->save();

        //
        if (file_exists($pix->qrcode_path)) {
            
        }
        //

        return redirect()->route('pix.show', $pix->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $pixs = Pix::findOrFail($id);
        return view('qrcode-down',compact('pixs'));
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
    public function download(string $id)
    {
        //
        $pix = Pix::findOrFail($id);
        $path = $pix->qrcode_path;
        Storage::disk('local')->put(date('d-m-Y_his_a', time()).'_pix.png', file_get_contents($path));
        $path = Storage::path(date('d-m-Y_his_a', time()).'_pix.png');

        return response()->download($path);
    }

}
