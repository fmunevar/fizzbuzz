<?php

namespace Tests\Unit\Http\Controllers;

use App\Exceptions\CustomException;
use App\Http\Controllers\FizzBuzz;
use Illuminate\Http\Request;
use Illuminate\Testing\TestResponse;
use Tests\TestCase;

class FizzBuzzTest extends TestCase
{
    // API TESTING
    public function test_fizz_buzz_api_returns_correct_json()
    {
        $response = $this->get('api/fizzbuzz/1/3');

        $response
            ->assertStatus(200)
            ->assertJson([
                1,
                2,
                "Fizz"
            ]);
    }

    public function test_fizz_buzz_api_returns_correct_json_negative_values()
    {
        $response = $this->get('api/fizzbuzz/-1/3');

        $response
            ->assertStatus(200)
            ->assertJson([
                -1,
                "FizzBuzz",
                1,
                2,
                "Fizz"
            ]);
    }

    public function test_api_returns_error_not_numeric()
    {
        $response = $this->get('api/fizzbuzz/a/a');
        $response->assertStatus(400);
    }

    public function test_api_returns_error_max_lower_than_min()
    {
        $response = $this->get('api/fizzbuzz/3/1');
        $response->assertStatus(400);
    }
}
