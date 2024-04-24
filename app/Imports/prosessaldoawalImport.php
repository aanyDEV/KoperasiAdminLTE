<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\saldoawalMdl;

class prosessaldoawalImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */

    public function model(array $row)
    {

        $existingData = saldoawalMdl::where('nomor_perkiraan', $row['nomor_perkiraan'])->first();

        // Jika data sudah ada, hapus data sebelumnya
        if ($existingData) {
            $existingData->delete();
        }

        $sa = $row['saldo_awal'];
        $saldoawal = (float) preg_replace("/[^0-9]/", "", $sa);

        return new saldoawalMdl([
            'nomor_perkiraan' => $row['nomor_perkiraan'],
            'nama_perkiraan' => $row['nama_perkiraan'],
            'jenis' => $row['jenis'],
            'saldo_awal' => $saldoawal,
            'created_by' => $row['created_by'],
        ]);
    }
}
