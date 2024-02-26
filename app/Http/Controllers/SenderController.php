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

    public function search(Request $request)
    {
        $document = $request->input('document');

        $sender = Sender::with('beneficiaries')->where('document', $document)->first();
        if ($sender) {
            return response()->json($sender);
        } else {
            // Cambiar de 404 a 200 cuando se encuentra el Sender
            return response()->json(['error' => 'Sender not found'], 404);
        }

    }
}
