<?php
declare(strict_types = 1);

namespace App\Telegram\Commands;

use React\EventLoop\Factory;
use unreal4u\TelegramAPI\Abstracts\TelegramTypes;
use unreal4u\TelegramAPI\Exceptions\ClientException;
use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\Telegram\Methods\GetChat as GetChatInfo;
use unreal4u\TelegramAPI\TgLog;
use unreal4u\TelegramAPI\Telegram\Types\Custom\ResultInt;

class GetChat
{
    protected $_info = null;

    public function __construct($id)
    {
        $loop = Factory::create();
        $tgLog = new TgLog(env('TELEGRAM_BOT'), new HttpClientRequestHandler($loop));

        $getChat = new GetChatInfo();
        $getChat->chat_id = $id;
        $getChatPromise = $tgLog->performApiRequest($getChat);
        $getChatPromise->then(
            function (TelegramTypes $getResponse) {
                $this->_info = $getResponse;
            },
            function (ClientException $e) {
                var_dump('Captured ClientException', $e->getError());
            }
        );
        $loop->run();
    }

    public function getInfo ()
    {
        return $this->_info;
    }
}