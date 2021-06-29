<?php


namespace Auditoriumus\TelegramBotApi;

use GuzzleHttp\Client;

class TelegramApiOptions
{
    private string $token;
    private string $baseUri;
    private string $uri;
    public Client $client;


    public function __construct()
    {
        $this->token = Init::getToken();
        $this->baseUri = Init::getBaseUri();
        $this->uri = Init::getUri();
        $this->client = new Client(['base_uri' => Init::getBaseUri()]);
    }


    public function getToken(): string
    {
        return $this->token;
    }


    public function getHttps(): string
    {
        return $this->baseUri . $this->uri;
    }

    public function sendMessage(int $chatId, string $message): bool
    {
        return sendResponse($this->client, $this->uri, 'sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
        ]);
    }

    public function sendHtmlMessage(int $chatId, string $message): bool
    {
        return sendResponse($this->client, $this->uri, 'sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'parse_mode' => 'HTML'
        ]);
    }


    public function sendPhoto(int $chatId, string $photo): bool
    {
        return sendResponse($this->client, $this->uri, 'sendPhoto', [
            'chat_id' => $chatId,
            'photo' => $photo,
            'parse_mode' => 'HTML'
        ]);
    }

    public function sendPhotoWithCaption(int $chatId, string $photo, string $message): bool
    {
        return sendResponse($this->client, $this->uri, 'sendPhoto', [
            'chat_id' => $chatId,
            'photo' => $photo,
            'caption' => $message,
            'parse_mode' => 'HTML'
        ]);
    }

    public function sendVoice(int $chatId, string $voice): bool
    {
        return sendResponse($this->client, $this->uri, 'sendVoice', [
            'chat_id' => $chatId,
            'voice' => $voice,
        ]);
    }

    public function sendDocument(int $chatId, string $document): bool
    {
        return sendResponse($this->client, $this->uri, 'sendDocument', [
            'chat_id' => $chatId,
            'document' => $document,
        ]);
    }

    public function sendVideo(int $chatId, string $video): bool
    {
        return sendResponse($this->client, $this->uri, 'sendVideo', [
            'chat_id' => $chatId,
            'video' => $video,
        ]);
    }


    public function sendVideoNote(int $chatId, string $videoNote): bool
    {
        return sendResponse($this->client, $this->uri, 'sendVideoNote', [
            'chat_id' => $chatId,
            'video_note' => $videoNote,
        ]);
    }


    /**
     * send Test
     * @param int $chatId
     * @param string $question
     * @param array $options is array of string values
     * @param bool $is_anonymous
     * @param array|null $reply_markup
     * @return bool
     */
    public function sendPoll(int $chatId, string $question, array $options, bool $is_anonymous = false, array $reply_markup = null): bool
    {
        if (!is_null($reply_markup)) {
            $reply_markup = json_encode($reply_markup);
        }

        return sendResponse($this->client, $this->uri, 'sendPoll', [
            'chat_id' => $chatId,
            'question' => $question,
            'options' => json_encode($options),
            'is_anonymous' => $is_anonymous,
            'reply_markup' => $reply_markup
        ]);
    }


    /**
     * @param int $chatId
     * @param array $media is an array consisting of arrays, each of which specifies a field with the type key as the
     * first parameter, and a field with the media key and the file_id value as the second parameter
     * @return bool
     */
    public function sendMediaGroup(int $chatId, array $media): bool
    {
        return sendResponse($this->client, $this->uri, 'sendMediaGroup', [
            'chat_id' => $chatId,
            'media' => json_encode($media),
        ]);
    }

}