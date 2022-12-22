<?php

namespace Tests\Feature;

use App\Models\Kangaroo;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StoreKangarooTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_store_kangaroo()
    {
        $data = Kangaroo::factory()->create();

        $response = $this->call('POST', '/api/kangaroo', json_encode($data));
        
        $response->assertSuccessful();
    }
}