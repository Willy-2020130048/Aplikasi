<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\DB;

class PembayaranSheetExport implements FromCollection, WithHeadings, WithTitle
{
    private $sheetName;
    private $filterData;

    public function __construct($sheetName, $filterData)
    {
        $this->sheetName = $sheetName;
        $this->filterData = $filterData;
    }

    public function collection()
    {
        $query = DB::table('detail_acaras')
            ->join('users', 'users.id', "=", "detail_acaras.id_peserta")
            ->join('acaras', 'acaras.id', "=", "detail_acaras.id_acara")
            ->join('ipdi_unit', 'ipdi_unit.id', "=", "users.instansi")
            ->join('reg_provinces', 'reg_provinces.id', "=", "users.provinsi")
            ->select(
                'users.nama_lengkap',
                'users.nira',
                'detail_acaras.nama_akun',
                'detail_acaras.no_ktp',
                'users.email',
                'detail_acaras.no_hp',
                'reg_provinces.name as provinsi',
                'ipdi_unit.nama_unit as instansi',
                'acaras.nama_acara',
                DB::raw("
                    CONCAT(
                        CASE
                            WHEN acaras.jenis_acara = 'Workshop' THEN 'WS'
                            ELSE 'Sim'
                        END,
                        CASE
                            WHEN acaras.workshop = 'Audit Klinis Dialisis' THEN '1AKD'
                            WHEN acaras.workshop = 'Health Technology Dialisis' THEN '2HTD'
                            WHEN acaras.workshop = 'CAPD' THEN '3CAPD'
                            ELSE ''
                        END,
                        detail_acaras.id
                    ) AS kode_singkat"
                ),
                'detail_acaras.sponsor'
            )
            ->orderBy('detail_acaras.id', 'asc');


        if (!empty($this->filterData)) {
            if (isset($this->filterData['provinsi'])) {
                $query->where('users.provinsi', $this->filterData['provinsi']);
            }

            if (isset($this->filterData['instansi'])) {
                $query->where('users.instansi', $this->filterData['instansi']);
            }

            if (isset($this->filterData['sponsor'])) {
                $query->where('detail_acaras.sponsor', $this->filterData['sponsor']);
            }
        }

    return $query->get();
    }

    public function headings(): array
    {
        return [
            'Nama Lengkap',
            'NIRA',
            'Nama LMS',
            'No KTP',
            'Email',
            'No HP',
            'Asal PW',
            'Instansi',
            'Acara',
            'Sponsor'
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}
