<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Utils\Formatter\CollectionFormatter;
use InvalidArgumentException;

uses(TestCase::class); 

enum MockStatus: string {
    case Pending = 'Pending';
}

test('FormatCollection transform a array of strings', function () {
    $options = [MockStatus::Pending];

    $result = CollectionFormatter::formatCollection($options);

    expect($result->first())->toBe(['id' => 'Pending', 'label' => 'Pending']);
});

test('FormatCollection transforms an array of objects', function() {
    $options = [
        (object) ['category_id' => 10, 'category_name' => 'Work'], 
    ];

    $result = CollectionFormatter::formatCollection($options, 'category_id', 'category_name'); 

    expect($result->first())->toBe([
        'id'    => 10, 
        'label' => 'Work'
    ]);
});

test('FormatCollection handles null or missing object properties', function () {
    expect(fn() => CollectionFormatter::formatCollection(null)) 
        ->toThrow(\InvalidArgumentException::class, "Provided collection cannot be empty.");
});