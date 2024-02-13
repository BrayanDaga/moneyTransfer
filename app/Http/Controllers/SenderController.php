<?php

namespace App\Http\Controllers;

use App\Models\Sender;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SenderController extends Controller
{
    public function index(Request $request)
    {
        $senders = Sender::all();

        return response()->json($senders);
    }

    public function show($id)
    {
        $sender = Sender::with('beneficiaries')->find($id);
        return response()->json($sender);
    }
}
