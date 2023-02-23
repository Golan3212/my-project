<?php

declare(strict_types=1);

namespace App\Services\Contracts;

interface Parser
{
    /**
     * @param $link
     * @return Parser
     */
    public function setLink($link) : self;

    /**
     * @return void
     */

    public function saveParseData():void;
}