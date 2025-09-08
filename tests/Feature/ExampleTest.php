test/Feature/ExampleTest.php
<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
     public function test_home_redirects_to_notes(): void
    {
        $response = $this->get('/');
        $response->assertRedirect('/notes');
    }
}
