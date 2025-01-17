<?php

declare(strict_types=1);

use Datomatic\EnumHelper\Tests\Support\Enums\Status;
use Datomatic\EnumHelper\Tests\Support\Enums\StatusString;

it('can return an array of descriptions', function ($className, $cases, $values) {
    expect($className::descriptions($cases))->toBe($values);
})->with([
    [Status::class, null, [
        'Await decision',
        'Recognized valid',
        'No longer useful',
        'No response',
    ]],
    [Status::class, [Status::PENDING, Status::DISCARDED], [
        'Await decision',
        'No longer useful',
    ]],
    [StatusString::class, [], []],
    [StatusString::class, [StatusString::ACCEPTED, StatusString::NO_RESPONSE], [
        'Recognized valid',
        'No response',
    ]],
]);

it('can return an associative array [value => description]', function ($className, $cases, $values) {
    expect($className::descriptionsArray($cases))->toBe($values);
})->with([
    'Pure Enum' => [Status::class, null, [
        'PENDING' => 'Await decision',
        'ACCEPTED' => 'Recognized valid',
        'DISCARDED' => 'No longer useful',
        'NO_RESPONSE' => 'No response',
    ]],
    'Pure Enum subset' => [Status::class, [Status::PENDING, Status::DISCARDED], [
        'PENDING' => 'Await decision',
        'DISCARDED' => 'No longer useful',
    ]],
    'Backed Enum' => [StatusString::class, null, [
        'P' => 'Await decision',
        'A' => 'Recognized valid',
        'D' => 'No longer useful',
        'N' => 'No response',
    ]],
    'Backed Enum subset' => [StatusString::class, [StatusString::DISCARDED, StatusString::ACCEPTED], [
        'D' => 'No longer useful',
        'A' => 'Recognized valid',
    ]],
]);

it('can return an associative array [description => value]', function ($className, $cases, $values) {
    expect($className::descriptionsArrayInverse($cases))->toBe($values);
})->with([
    'Pure Enum' => [Status::class, null, [
        'Await decision' => 'PENDING',
        'Recognized valid' => 'ACCEPTED',
        'No longer useful' => 'DISCARDED',
        'No response' => 'NO_RESPONSE',
    ]],
    'Pure Enum subset' => [Status::class, [Status::NO_RESPONSE], [
        'No response' => 'NO_RESPONSE',
    ]],
    'Backed Enum empty' => [StatusString::class, null, [
        'Await decision' => 'P',
        'Recognized valid' => 'A',
        'No longer useful' => 'D',
        'No response' => 'N',
    ]],
    'Backed Enum' => [StatusString::class, [], []],
    'Backed Enum subset' => [StatusString::class, [StatusString::PENDING, StatusString::ACCEPTED, StatusString::DISCARDED, StatusString::NO_RESPONSE], [
        'Await decision' => 'P',
        'Recognized valid' => 'A',
        'No longer useful' => 'D',
        'No response' => 'N',
    ]],
]);
