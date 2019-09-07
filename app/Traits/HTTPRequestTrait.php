<?php


namespace App\Traits;

trait HTTPRequestTrait
{
    protected function setErrorResponse(int $responseCode, string $responseText): array
    {
        return [
            'error' => [
                'code' => $responseCode,
                'message' => $responseText,
            ]
        ];
    }
}
