<?php

namespace App\Http\Helper;

use Illuminate\Http\JsonResponse;

class ResponseHelper
{
    public function error(array $errors, int $httpCode): JsonResponse
    {
        return response()->json(['errors' => $errors, 'success' => false], $httpCode);
    }
    public function success(array $data, int $httpCode): JsonResponse
    {
        return response()->json(['data' => $data, 'success' => true], $httpCode);
    }
}
