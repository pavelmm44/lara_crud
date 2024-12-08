<?php

namespace App\Services\AddressParsers;

use Dadata\DadataClient;

class DadataParser implements ParserInterface
{
    private DadataClient $dadata;

    public function __construct()
    {
        $this->dadata = new DadataClient(config('dadata.token'), config('dadata.secret'));
    }

    public function clean($name, $value): mixed
    {
        return $this->dadata->clean($name, $value);
    }
}
