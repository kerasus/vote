<?php


namespace App\Traits;

trait HTTPRequestTrait
{
    protected function setErrorResponse(int $responseCode, string $responseText, string $infoIndex = 'extraInfo', array $extraInfo = []): array
    {
        return [
            'message' => $responseText,
            'code'    => $responseCode,
            'errors'  => [
                $infoIndex => $extraInfo,
            ],
        ];
    }
}
