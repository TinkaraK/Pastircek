<?php

namespace App\Enum;

class GerkType
{
    public const PERMANENT_MEADOW = 1300;
    public const EXTENSIVE_OR_MEADOW_ORCHARD = 1222;
    public const TEMPORARY_GRASSLAND = 1131;
    public const FIELD = 1100;

    public static function getAll() {
        return [
            self::PERMANENT_MEADOW,
            self::EXTENSIVE_OR_MEADOW_ORCHARD,
            self::TEMPORARY_GRASSLAND,
            self::FIELD,
        ];
    }

    public static function translate($type) {
        $name = match ($type) {
            self::PERMANENT_MEADOW => "Trajni travnik",
            self::EXTENSIVE_OR_MEADOW_ORCHARD => "Ekstenzivni oz. travniški sadovnjak",
            self::TEMPORARY_GRASSLAND => "Začasno travinje",
            self::FIELD => "Njiva",
            default => "Neznano",
        };
        return $name . " ($type)";
    }
}
