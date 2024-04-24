<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\ToModel;
use App\Models\kasbankMdl;

class kasbankimport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $existingData = kasbankMdl::where('nomor_bukti', $row['nomor_bukti'])->first();

        // Jika data sudah ada, hapus data sebelumnya
        if ($existingData) {
            $existingData->delete();
        }

        $ju = $row['jumlah_uang'];
        $jumlahuang = (float) preg_replace("/[^0-9]/", "", $ju);

        return new kasbankMdl([
            'tanggal' => \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['tanggal']),
            'jenis' => $row['jenis'],
            'nomor_bukti' => $row['nomor_bukti'],
            'nomor_perkiraan' => $row['nomor_perkiraan'],
            'nomor_perkiraan_lawan' => $row['nomor_perkiraan_lawan'],
            'deskripsi' => $row['deskripsi'],
            'ubl' => $row['ubl'],
            'jumlah_uang' => $jumlahuang,
            'created_by' => $row['created_by'],
        ]);
    }
}
