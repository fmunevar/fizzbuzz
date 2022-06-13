<?php

namespace App\Http\Controllers;

use App\Utils\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class FizzBuzz extends Controller
{
    public function main($min, $max, Request $request)
    {
        Log::channel('daily')->info("Request URL: " . $request->url());
        Validator::ValidateInput($min, $max);

        /*
        There are different ways to solve FizzBuzz so I just wanted to change the
        classic way.
        */
        do {
            $textToShow = '';
            $textToShow .= ($min % 3 == 0) ? 'Fizz' : '';
            $textToShow .= ($min % 5 == 0) ? 'Buzz' : '';
            $result[] = ($textToShow != '') ? $textToShow : (int)$min;
        } while ($min++ < $max);

        return response()->json($result);
    }
}
