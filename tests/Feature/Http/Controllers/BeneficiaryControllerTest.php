<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\BankAccount;
use App\Models\Beneficiary;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\BeneficiaryController
 */
final class BeneficiaryControllerTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function show_beneficiary_with_bank_acounts()
    {
        $beneficiary = Beneficiary::factory()->has(BankAccount::factory()->count(1))->create();
        $bankAccount = $beneficiary->bankAccounts->first();

        //$response = $this->get(route('sender.show', ['id' => $sender->id]));
        $response = $this->get("/beneficiary/".$beneficiary->id."");

        $response->assertOk()->assertJson([
            'id' => $beneficiary->id,
            'name' => $beneficiary->name,
            'surname' => $beneficiary->surname,
            'document' => $beneficiary->document,
            'cellphoneNumber' => $beneficiary->cellphoneNumber,
            'typeOfDocument' => $beneficiary->typeOfDocument,
            'country' => $beneficiary->country,
            'bank_accounts' => [
                [
                    'id' => $bankAccount->id,
                    'name' => $bankAccount->name,
                ],
            ],
        ]);
    }

}
