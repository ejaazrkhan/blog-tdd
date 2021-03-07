<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BlogTest extends TestCase
{
    /** @test */
    public function user_can_see_all_the_blogs()
    {
        $response = $this->get('/blog');

        $response->assertStatus(200);
    }
}
