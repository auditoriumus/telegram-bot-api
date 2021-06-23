<?php


namespace Auditoriumus\TelegramBotApi;


class TelegramBot extends Init
{
    public function writeLog(string $filename, $data)
    {
        //определяем папку с логами
        $dir = __DIR__ . '/../../../logs';
        //проверяем существует ли папка
        if (!file_exists($dir)) {
            mkdir($dir);
        }
        //записываем файл логов
        if (is_array($data)) {
            $data = print_r($data, true);
        }
        file_put_contents($dir . '/' . $filename, $data . "\n", FILE_APPEND);
    }

    public function getChatId(): int
    {
        return (int)$this->chatInfo['message']['chat']['id'];
    }

    /**
     * messages
     * @return bool
     */
    public function hasText(): bool
    {
        return isset($this->chatInfo['message']['text']);
    }
    public function getText()
    {
        return $this->chatInfo['message']['text'];
    }

    /**
     * photos
     * @return bool
     */
    public function hasPhoto(): bool
    {
        return isset($this->chatInfo['message']['photo']);
    }

    public function getReceivedPhoto()
    {
        return $this->chatInfo['message']['photo'] ?? false;
    }

    public function getReceivedPhotoId()
    {
        return $this->chatInfo['message']['photo'][0]['file_id'] ?? false;
    }

    /**
     * Voices
     * @return bool
     */
    public function hasVoice(): bool
    {
        return isset($this->chatInfo['message']['voice']);
    }

    public function getReceivedVoice()
    {
        return $this->chatInfo['message']['voice'] ?? false;
    }

    public function getReceivedVoiceId()
    {
        return $this->chatInfo['message']['voice']['file_id'] ?? false;
    }

    /**
     * Documents
     * @return bool
     */
    public function hasDocument(): bool
    {
        return isset($this->chatInfo['message']['document']);
    }

    public function getReceivedDocument()
    {
        return $this->chatInfo['message']['document'] ?? false;
    }

    public function getReceivedDocumentId()
    {
        return $this->chatInfo['message']['document']['file_id'] ?? false;
    }

    /**
     * Videos
     * @return bool
     */
    public function hasVideo(): bool
    {
        return isset($this->chatInfo['message']['video']);
    }

    public function getReceivedVideo()
    {
        return $this->chatInfo['message']['video'] ?? false;
    }

    public function getReceivedVideoId()
    {
        return $this->chatInfo['message']['video']['file_id'] ?? false;
    }

    /**
     * Video notes
     * @return bool
     */
    public function hasVideoNote(): bool
    {
        return isset($this->chatInfo['message']['video_note']);
    }

    public function getReceivedVideoNote()
    {
        return $this->chatInfo['message']['video_note'] ?? false;
    }

    public function getReceivedVideoNoteId()
    {
        return $this->chatInfo['message']['video_note']['file_id'] ?? false;
    }

    /**
     * callback_query from buttons
     * @return bool
     */
    public function hasCallbackQuery(): bool
    {
        return isset($this->chatInfo['callback_query']);
    }

    public function getCallbackQuery()
    {
        return $this->chatInfo['callback_query'] ?? false;
    }

    public function getCallbackQueryData()
    {
        return $this->chatInfo['callback_query']['data'] ?? false;
    }


    /**
     * Stickers
     * @return mixed
     */
    public function hasSticker()
    {
        return $this->chatInfo['message']['sticker'];
    }

    public function getReceivedSticker()
    {
        return $this->chatInfo['message']['sticker'] ?? false;
    }

    public function getReceivedStickerId()
    {
        return $this->chatInfo['message']['sticker']['file_id'] ?? false;
    }
}