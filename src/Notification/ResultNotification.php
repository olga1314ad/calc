<?php

namespace App\Notification;

class ResultNotification
{
    private int $content;

    public function __construct( int $result)
    {
        $this->content = $result ;
    }

    public function getContent(){
        return $this->content;
    }
}