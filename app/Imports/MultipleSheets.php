<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MultipleSheetsImport implements WithMultipleSheets
{
    public function sheets(): array
    {
        return [
            'Sheet1' => new datakasbankimport(),
            'Sheet2' => new datamemorialimport(),
            'Sheet3' => new noperkiraanImport(),
            'Sheet4' => new prosessaldoawalimport(),
            'Sheet5' => new rabtahunanimport(),
        ];
    }
}