<?php

namespace App\Services\AddressParsers;

interface ParserInterface
{
    public function clean($name, $value): mixed;
}
