<?php

declare(strict_types=1);

namespace Datomatic\EnumHelper\Tests\Support\Enums;

use Datomatic\EnumHelper\EnumHelper;

/**
 * @method static string pending()
 * @method static string Pending()
 * @method static string PENDING()
 * @method static string noResponse()
 * @method static string NO_RESPONSE()
 * @method static string NoResponse()
 */
enum StatusPascalCase
{
    use EnumHelper;

    case Pending;

    case Accepted;

    case Discarded;

    case NoResponse;
}
