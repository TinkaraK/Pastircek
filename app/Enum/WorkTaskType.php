<?php

namespace App\Enum;

class WorkTaskType
{
    public const MOWING = "mowing";
    public const GATHERING = "gathering";
    public const GRAZING = "grazing";
    public const CLEANING_MOWING = "cleaning_mowing";
    public const OTHER = "other";

    public static function getAll() {
        return [
            self::MOWING,
            self::GATHERING,
            self::GRAZING,
            self::CLEANING_MOWING,
            self::OTHER,
        ];
    }

    public static function translate($type) {
        return match ($type) {
            self::MOWING => "1. Košnja",
            self::GATHERING => "2. Spravilo",
            self::GRAZING => "3. Paša",
            self::CLEANING_MOWING => "4. Čistilna košnja",
            self::OTHER => "5. Druga delovna opravila",
            default => "Neznano",
        };
    }

}
