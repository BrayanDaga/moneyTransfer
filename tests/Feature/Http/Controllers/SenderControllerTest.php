<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Sender;
use App\Models\Beneficiary;
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
    public function show_sender_with_beneficiaries()
    {
        $sender = Sender::factory()->has(Beneficiary::factory()->count(1))->create();
        $beneficiary = $sender->beneficiaries->first();

        //$response = $this->get(route('sender.show', ['id' => $sender->id]));
        $response = $this->get("/sender/".$sender->id."");

        $response->assertOk()->assertJson([
            'id' => $sender->id,
            'name' => $sender->name,
            'surname' => $sender->surname,
            'document' => $sender->document,
            'cellphoneNumber' => $sender->cellphoneNumber,
            'typeOfDocument' => $sender->typeOfDocument,
            'country' => $sender->country,
            'beneficiaries' => [
                [
                    'id' => $beneficiary->id,
                    'name' => $beneficiary->name,
                ],
            ],
        ]);
    }


/** @test */
public function search_sender_with_beneficiaries_by_document()
{
    $sender = Sender::factory()->has(Beneficiary::factory()->count(1))->create(['document'=>'74953214']);

     $response = $this->get(route('sender.search', ['document' => $sender->document]));


    // Verifica que la respuesta tiene un código de estado 200 o 404
    $response->assertStatus(200)
        ->assertJson([
            'id' => $sender->id,
            'name' => $sender->name,
            'surname' => $sender->surname,
            'document' => $sender->document,
            'cellphoneNumber' => $sender->cellphoneNumber,
            'typeOfDocument' => $sender->typeOfDocument,
            'country' => $sender->country,
        ])
        ->assertJsonMissing(['error' => 'Sender not found']);
}


/** @test */
public function search_sender_by_document_not_found()
{
    $sender = Sender::factory()->has(Beneficiary::factory()->count(1))->create(['document'=>'74953214']);

     $response = $this->get(route('sender.search', ['document' => '1234221']));


     $response->assertStatus(404)
     ->assertJson([
         'error' => 'Sender not found',
     ]);
}



}
