<?php

namespace App\Enum;

class SchemeType
{
    public const EXTENSIVE_GRASSLAND = "EKST";
    public const TRADITIONAL_USE_OF_GRASSLANDS = "TRT";
    public const FERTILIZATION_WITH_ORGANIC_FERTILIZERS = "NIZI";

    public static function getAll() {
        return [
            self::EXTENSIVE_GRASSLAND,
            self::TRADITIONAL_USE_OF_GRASSLANDS,
            self::FERTILIZATION_WITH_ORGANIC_FERTILIZERS,
        ];
    }

    public static function translate($type) {
        $name = match ($type) {
            self::EXTENSIVE_GRASSLAND => "Ekstenzivno travinje",
            self::TRADITIONAL_USE_OF_GRASSLANDS => "Tradicionalna raba travinja",
            self::FERTILIZATION_WITH_ORGANIC_FERTILIZERS => "Gnojenje z organskimi gnojili z majhnimi izpusti v zrak",
            default => "Neznano",
        };
        return $name . " ($type)";
    }
}
