<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class UsersExport implements WithMultipleSheets
{
    use Exportable;

    private $sheetsData;

    // Constructor menerima parameter $sheetsData untuk customisasi sheet
    public function __construct(array $sheetsData)
    {
        $this->sheetsData = $sheetsData;
    }

    public function sheets(): array
    {
        $sheets = [];

        // Menambahkan sheet berdasarkan $sheetsData yang diberikan saat inisialisasi
        foreach ($this->sheetsData as $sheetData) {
            $sheetName = $sheetData['name'] ?? 'Sheet';  // Nama default jika tidak diberikan
            $filterData = $sheetData['filter'] ?? null;  // Filter data jika ada
            if($sheetData['type'] == 'Users'){
                $sheets[] = new UsersSheetExport($sheetName, $filterData);
            } if($sheetData['type'] == 'Pembayaran'){
                $sheets[] = new PembayaranSheetExport($sheetName, $filterData);
            }
        }

        return $sheets;
    }
}
