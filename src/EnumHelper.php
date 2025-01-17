<?php

declare(strict_types=1);

namespace Datomatic\EnumHelper;

use Datomatic\EnumHelper\Traits\EnumEquality;
use Datomatic\EnumHelper\Traits\EnumFrom;
use Datomatic\EnumHelper\Traits\EnumInvokable;
use Datomatic\EnumHelper\Traits\EnumLocalization;
use Datomatic\EnumHelper\Traits\EnumNames;
use Datomatic\EnumHelper\Traits\EnumValues;

trait EnumHelper
{
    use EnumInvokable;
    use EnumNames;
    use EnumValues;
    use EnumFrom;
    use EnumEquality;
    use EnumLocalization;
}
