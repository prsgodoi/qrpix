<?php

namespace App\Http\Controllers;

use App\Models\Banco;
use Illuminate\Http\Request;

use Junges\Pix\Exceptions\InvalidPixKeyException;
use Junges\Pix\Exceptions\PixException;
use Junges\Pix\Http\Requests\CreateQrCodeRequest;
use Junges\Pix\Payload;
use Junges\Pix\Pix;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

use Symfony\Component\HttpFoundation\Response;


class BancoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('banco.index');
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
        $banco = new Banco;

        $total = $request->input('total');

        $amount = preg_replace('/[^0-9]/', '', $total);    
        $amount = bcdiv($amount, 100, 2);
        $amount = strtr($amount, ',', '.');

        $total = $amount;

        $n = rand(1, 9999999);
        $transaction_id = 'UTIL-PIX-' . str_pad(str_pad($n, 7, 0, STR_PAD_LEFT), 7, "0", STR_PAD_LEFT);

        try {
            $payload = (new Payload())
                ->pixKey($request->input('key'))
                ->description($request->input('description'))
                ->merchantName($request->input('recipient'))
                ->merchantCity($request->input('city'))
                ->amount($total)
                ->transactionId($request->input('description'));
        } catch (InvalidPixKeyException $exception) {
            return response()->json($exception->getMessage());
        }

        try {
            $payload_string = $payload->getPayload();
        } catch (PixException $exception) {
            return response()->json($exception->getMessage());
        }

        //
        
        $banco->name = $request->input('name');
        $banco->pix = $payload_string;
        $banco->total = $total;

        $qr = QrCode::format('png')->size(500)->generate($banco->pix);
        $fileName = 'payment_qrcode_'.uniqid(time()).'.png';
        $file = public_path('qrcode/'.$fileName);
        file_put_contents($file,$qr);
        $qrPatch = asset('qrcode/'.$fileName);

        $banco->qrcode_path = $qrPatch;

        $banco->transaction_id = $transaction_id;

        $banco->save();

        return redirect()->route('pix.show', $banco->id);
    }

    /**
     * Display the specified resource.
     */
    public function show(Banco $banco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banco $banco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banco $banco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banco $banco)
    {
        //
    }
}
