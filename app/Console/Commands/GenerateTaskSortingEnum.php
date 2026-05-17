<?php

namespace App\Console\Commands;

use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;
use App\Enums\Sorting; 

#[Signature('generate:task-sorting-options')]
#[Description('Command description')]
class GenerateTaskSortingEnum extends Command
{
    public function handle()
    {
        $enums = [
            'SortingOptions' => array_column(Sorting::cases(), 'value', 'name'),
        ];

        $content = "// AUTO-GENERATED FILE. \n\n";
        foreach ($enums as $name => $values) {
            $content .= "export const {$name} = " . json_encode($values, JSON_PRETTY_PRINT) . ";\n\n";
        }

        file_put_contents(resource_path('js/enums/taskSortingOptions.js'), $content);
    }
}
