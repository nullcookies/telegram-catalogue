<?php
declare(strict_types = 1);

namespace App\Telegram\Commands;

use React\EventLoop\Factory;
use unreal4u\TelegramAPI\Exceptions\ClientException;
use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\Telegram\Methods\GetChatMembersCount;
use unreal4u\TelegramAPI\TgLog;
use unreal4u\TelegramAPI\Telegram\Types\Custom\ResultInt;

class GetUsersCount
{
    protected $_count = null;

    public function __construct($id)
    {
        $loop = Factory::create();
        $tgLog = new TgLog(env('TELEGRAM_BOT'), new HttpClientRequestHandler($loop));

        $getCMC = new GetChatMembersCount();
        $getCMC->chat_id = $id;
        $getChatMembersCountPromise = $tgLog->performApiRequest($getCMC);
        $getChatMembersCountPromise->then(
            function (ResultInt $getChatMembersCountResponse) {
                $this->_count = $getChatMembersCountResponse;
            },
            function (ClientException $e) {
                var_dump('Captured ClientException', $e->getError());
            }
        );
        $loop->run();
    }

    public function getCount ()
    {
        return $this->_count->data;
    }

}