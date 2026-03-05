<?php

namespace App\Http\Controllers;

abstract class Controller
{
    //
    public function message($code, $message)
    {
        return response()->json($message, $code);
    }
}
