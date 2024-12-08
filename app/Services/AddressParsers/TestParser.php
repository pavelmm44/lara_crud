<?php

namespace App\Services\AddressParsers;

class TestParser implements ParserInterface
{
    public function __construct(){}

    public function clean($name, $value): mixed
    {
        return "Name: $name || Value: $value";
    }
}
