<?php

namespace App\Interfaces;

interface OtpSenderInterface
{
    public function send($code, $toWhom): void;
}