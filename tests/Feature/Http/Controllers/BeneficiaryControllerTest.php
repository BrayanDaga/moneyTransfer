<?php

namespace Tests\Feature\Http\Controllers;

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
    public function index_responds_with(): void
    {
        $beneficiaries = Beneficiary::factory()->count(3)->create();

        $response = $this->get(route('beneficiary.index'));

        $response->assertOk();
        $response->assertJson($beneficiaries);
    }
}
