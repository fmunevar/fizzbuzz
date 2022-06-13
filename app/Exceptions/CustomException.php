<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Support\Facades\Log;

class CustomException extends Exception
{
    public function render()
    {
        Log::channel('daily')->error($this->getMessage());
        return response()->json(["message" => $this->getMessage()], 400);
    }
}
