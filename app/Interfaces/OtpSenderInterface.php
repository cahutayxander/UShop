<?php

namespace App\Interfaces;

interface OtpSenderInterface
{
    public function send(string $code, string $toWhom): void;
}