<?php

namespace App\Enums;

enum PartyType: string
{
    case CLIENT = "CLIENT";
    case VENDOR = "VENDOR";
    case EMPLOYEE = "EMPLOYEE";

    public function label(): string
    {
        return ucwords(str_replace('_', ' ', strtolower($this->name)));
    }
}
