<?php

namespace App\Http\Controllers;

use App\Services\GuestbookService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GuestbookController extends Controller
{
    protected $guestbook;
    public function __construct(GuestbookService $guestbookService)
    {
        $this->guestbook = $guestbookService;
    }

    public function index()
    {
        return view('guestbook');
    }

    public function store(Request $request)
    {
        $data = $request->except('_token');

        DB::beginTransaction();
        try {
            $this->guestbook->store($data);
        } catch (\Throwable $th) {
            return response()->json(['msg' => $th]);
        }

        DB::commit();
        return response()->json([
            "success"   => true,
            "message"   => "Terimakasih Sudah Mengisi Buku Tamu"
        ], 201);
    }

    public function thankyou()
    {
        return view('thankyou');
    }
}
