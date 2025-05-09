<?php

namespace App;

enum CartStatus: string
{
    case EMPTY = 'empty';
    case LOADED = 'loaded';
    case CHECKED_OUT = 'checked_out';
    case CLOSE = 'close';

    public function isFinal(): bool
    {
        return in_array($this, [self::CHECKED_OUT]);
    }
}
