<?php

namespace App\Enums;

enum Status
{
    case Active;
    case Inactive;

    public function color(): string
    {
        return match ($this) {
            self::Active => 'green',
            self::Inactive => 'red',
        };
    }
}
