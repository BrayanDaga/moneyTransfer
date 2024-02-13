<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sender;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SenderController
 */
final class SenderControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function index_responds_with(): void
    {
        $senders = Sender::factory()->count(3)->create();

        $response = $this->get(route('sender.index'));

        $response->assertOk();
        $response->assertJson($senders);
    }


    /** @test */
    public function show_displays_view(): void
    {
        $sender = Sender::factory()->create();

        $response = $this->get(route('sender.show', $sender));

        $response->assertOk();
        $response->assertViewIs('sender');
        $response->assertViewHas('beneficiaries');
    }
}
