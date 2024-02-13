<?php

namespace App\Http\Controllers;

use App\Models\Beneficiary;
use Illuminate\Http\Request;

class BeneficiaryController extends Controller
{
    public function index(Request $request)
    {
        $beneficiaries = Beneficiary::all();

        return $beneficiaries;
    }

    public function show($id )
    {
        $beneficiary = Beneficiary::with('bankAccounts')->find($id);
        return $beneficiary;
    }
}
