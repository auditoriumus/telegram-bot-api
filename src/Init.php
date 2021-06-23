<?php


namespace Auditoriumus\TelegramBotApi;


class Init
{
    protected static string $token;
    protected static string $uri;
    protected static string $baseUri;
    public array $chatInfo;

    public function __construct(string $token)
    {
        self::$token = $token;
        self::$baseUri = 'https://api.telegram.org';
        self::$uri = '/bot' . $token . '/';
        $this->chatInfo = json_decode(file_get_contents('php://input'), true);
    }

    public static function getToken(): string
    {
        return self::$token;
    }

    public static function getUri(): string
    {
        return self::$uri;
    }

    public static function getBaseUri(): string
    {
        return self::$baseUri;
    }
}