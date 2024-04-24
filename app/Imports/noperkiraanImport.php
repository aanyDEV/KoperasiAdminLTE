<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\noperMdl;

class noperkiraanImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    // use Importable;
    public function model(array $row)
    {
        $existingData = noperMdl::where('kode', $row['kode'])->first();

        if ($existingData) {
            $existingData->delete();
        }
        return new noperMdl([
            'kode' => $row['kode'],
            'uraian' => $row['uraian'],
            'created_by' => $row['created_by'],
        ]);
    }
}