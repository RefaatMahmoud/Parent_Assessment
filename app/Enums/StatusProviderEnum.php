<?php

namespace App\Enums;

abstract class StatusProviderEnum
{
    const AUTHORIZED      = 'authorized';
    const DECLINE         = 'decline';
    const REFUNDED        = 'refunded';
    const AUTHORIZED_CODE = 1;
    const DECLINE_CODE    = 2;
    const REFUNDED_CODE   = 3;
}
