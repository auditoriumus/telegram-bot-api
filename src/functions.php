<?php

namespace Auditoriumus\TelegramBotApi;

function sendResponse(
    $guzzleClient,
    string $uri,
    string $method,
    array $parameters,
    bool $log = false): bool
{
    try {
        $guzzleClient->request('GET', $uri . $method, [
            'query' => $parameters
        ]);
        return true;
    } catch (\Exception $e) {
        if ($log) {
            file_put_contents(__DIR__ . '/../../../logs/error.txt', $e->getMessage() . "\n", FILE_APPEND);
        }
        return false;
    }
}