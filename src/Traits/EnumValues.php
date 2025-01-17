<?php

declare(strict_types=1);

namespace Datomatic\EnumHelper\Traits;

use BackedEnum;

trait EnumValues
{
    /**
     * Get an array of case values.
     *
     * @param null|array<self> $cases
     * @return array<string|int>
     */
    public static function values(?array $cases = null): array
    {
        $cases ??= static::cases();

        return isset($cases[0]) && $cases[0] instanceof BackedEnum
            ? array_column($cases, 'value')
            : array_column($cases, 'name');
    }

    /**
     * Get an associative array of [case name => case value].
     *
     * @return array<string,string|int>
     */
    public static function valuesArray(?array $cases = null): array
    {
        $cases ??= static::cases();

        return isset($cases[0]) && $cases[0] instanceof BackedEnum
            ? array_column($cases, 'value', 'name')
            : array_column($cases, 'name');
    }
}
