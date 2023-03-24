<?php declare(strict_types=1);

namespace App;

class Reverser
{

    public function exec(string $in): string
    {
        return \strrev($in);
    }
}
