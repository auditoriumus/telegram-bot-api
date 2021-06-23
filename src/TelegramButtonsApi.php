<?php


namespace Auditoriumus\TelegramBotApi;


use GuzzleHttp\Client;

class TelegramButtonsApi
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

    /**
     * @param int $chatId
     * @param array $buttonsArray the array consists of arrays, each of which includes the text field-what is reflected on the button and the field callback_data - json which the button returns
     * @param string $message
     */
    public function addInlineButton(int $chatId, array $buttonsArray, string $message): void
    {
        $keyboard = [$buttonsArray];

        sendResponse($this->client, $this->uri,'sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode(['inline_keyboard' => $keyboard])
        ]);
    }

    /**
     * The method add keyboard under text input. Each of key return itself text
     * @param int $chatId
     * @param array $buttonsArray
     * @param string $message
     */
    public function addKeyboard(int $chatId, array $buttonsArray, string $message): void
    {
        $keyboard = [$buttonsArray];

        sendResponse($this->client, $this->uri,'sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode(['keyboard' => $keyboard])
        ]);
    }


    /**
     * The method remove keyboard under text input.
     * @param int $chatId
     * @param string $message
     */
    public function removeKeyboard(int $chatId, string $message): void
    {
        sendResponse($this->client, $this->uri,'sendMessage', [
            'chat_id' => $chatId,
            'text' => $message,
            'reply_markup' => json_encode(['remove_keyboard' => true])
        ]);
    }


}