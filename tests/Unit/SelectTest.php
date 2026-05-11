<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\View\Components\Forms\Select;

uses(TestCase::class); 

beforeEach(function () {
    // Assign
    $this->select = new Select(
        options: [], 
        labelName: 'Category', 
        inputName: 'category_id', 
        idKey: 'id', 
        valueKey: 'value'
    );
});

test('FormatCollection transform a array of strings', function () {
    $options = ['Low priority', 'Medium priority', 'High priority']; 

    $result = $this->select->formatCollection($options); 

    expect($result->first())->toBe(['id' => 'Low priority', 'label' => 'Low priority']);
});

test('FormatCollection transforms an array of objects', function() {
    $customSelect = new Select(
        options: [],
        idKey: 'category_id',
        valueKey: 'category_name'
    );

    $options = [
        (object) ['category_id' => 10, 'category_name' => 'Work'], 
    ];

    $result = $customSelect->formatCollection($options); 

    expect($result->first())->toBe([
        'id'    => 10, 
        'label' => 'Work'
    ]);
});

test('FormatCollection handles null or missing object properties', function () {
    $options = [(object) ['wrong_key' => 'data']];

    $result = $this->select->formatCollection($options); 

    expect($result->first())->toBe([
        'id'    => null, 
        'label' => null
    ]);
});
