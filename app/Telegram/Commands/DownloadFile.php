<?php
declare(strict_types = 1);

namespace App\Telegram\Commands;

use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;
use React\EventLoop\Factory;
use unreal4u\TelegramAPI\HttpClientRequestHandler;
use unreal4u\TelegramAPI\InternalFunctionality\TelegramDocument;
use unreal4u\TelegramAPI\Telegram\Methods\GetFile;
use unreal4u\TelegramAPI\Telegram\Types\File;
use unreal4u\TelegramAPI\TgLog;

class DownloadFile
{
    protected $_data = null;

    public function __construct($id)
    {
        $loop = Factory::create();
        $tgLog = new TgLog(env('TELEGRAM_BOT'), new HttpClientRequestHandler($loop));
        $getFile = new GetFile();
        // You can get a file id from an update, webhook or any other message object
        $getFile->file_id = $id;
        $filePromise = $tgLog->performApiRequest($getFile);
        $filePromise->then(
            function (File $file) use ($tgLog) {
                $documentPromise = $tgLog->downloadFile($file);
                $documentPromise->then(function (TelegramDocument $tgDocument) use ($file) {


                    $this->_data = $tgDocument->contents;

                    /*$imgName = uniqid('img_').'.jpg';
                    Storage::put($imgName, );

                    $storedImage = Storage::get($imgName);

                    $image = Image::make(base64_decode($storedImage));
                    $image->response('jpg', 60);

                    /*try {
                        $image = Image::make($tgDocument->contents);
                        dd($image);
                    } catch (Exception $ex) {
                        dd($ex);
                    }
                    //$image = Image::make($tgDocument->contents);

                    dd($tgDocument);*/
                    // Offer to download the file immediately
                    /*header(sprintf('Content-Type: %s', $tgDocument->mime_type));
                    header(sprintf('Content-Length: %d', $tgDocument->file_size));
                    header(sprintf('Content-Disposition: inline; filename="%s"', basename($file->file_path)));
                    print $tgDocument;*/
                });
            }
        );
        $loop->run();
    }

    public function getData ()
    {
        return $this->_data;
    }
}