<?php

namespace App\Message;

use App\Notification\ResultNotification;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class SendResultMessageHandler implements MessageHandlerInterface
{
    public function __invoke(ResultNotification $resultNotification)
    {
        sleep(19);
        echo  "Результат вычислений ".$resultNotification->getContent();
    }
}