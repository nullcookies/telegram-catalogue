<?php
/**
 * Created by PhpStorm.
 * User: pavlenko
 * Date: 13.12.17
 * Time: 16:48
 */

namespace App\Telegram;


use App\Telegram\Commands\DownloadFile;
use App\Telegram\Commands\GetChat;
use App\Telegram\Commands\GetUsersCount;

class Telegram
{
    public static function getUsersCount ($id)
    {
        $instance = new GetUsersCount($id);

        return $instance->getCount();
    }

    public static function getChat ($id)
    {
        $instance = new GetChat($id);

        return $instance->getInfo();
    }

    public static function getFile ($id)
    {
        $instance = new DownloadFile($id);

        return $instance->getData();
    }
}