<?php

namespace App\Http\Controllers;

class FrontResponseController extends controller
{

    protected function successResponse($message = "Success", $status = true){
        return response()->json([
            'status' => $status,
            'message' => $message
        ]);
    }

}
