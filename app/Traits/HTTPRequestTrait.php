<?php


namespace App\Traits;

trait HTTPRequestTrait
{
    protected function setErrorResponse(int $responseCode, string $responseText): array
    {
        return [
            'message' => $responseText,
            'error' => [
                'code' => $responseCode,
            ]
        ];
    }
}
