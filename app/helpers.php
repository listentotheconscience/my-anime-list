<?php

use Illuminate\Http\JsonResponse;
use Laravel\Passport\PersonalAccessTokenResult;

function successResponse(mixed $data = null, ?string $message = null, int $code = 200): JsonResponse
{
    $response = [
        'status' => 'success',
    ];
    if (!is_null($data)) $response['data'] = $data;
    if (!is_null($message)) $response['message'] = $message;

    return response()->json($response, $code);
}

function errorResponse(string $message, int $code = 400): JsonResponse
{
    return response()->json([
        'status' => 'error',
        'message' => $message
    ], $code);
}

function successTokenResponse(PersonalAccessTokenResult $accessToken): JsonResponse
{
    return successResponse([
        'token_type' => 'bearer',
        'token' => $accessToken->accessToken
    ], null, 201);
}
