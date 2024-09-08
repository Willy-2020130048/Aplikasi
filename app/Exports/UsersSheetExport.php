<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Illuminate\Support\Facades\DB;

class UsersSheetExport implements FromCollection, WithHeadings, WithTitle
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
        $query = DB::table('users')
        ->join('ipdi_unit', 'users.instansi', '=', 'ipdi_unit.id')
        ->join('reg_provinces', 'users.provinsi', '=', 'reg_provinces.id')
        ->select(
            'users.nira',
            'users.no_str',
            'users.nama_lengkap',
            'users.jenis_kelamin',
            'users.email',
            DB::raw("CONCAT(users.tempat_lahir, ', ', DATE_FORMAT(users.tanggal_lahir, '%d-%m-%Y')) as tempat_tanggal_lahir"),
            'reg_provinces.name as provinsi',
            'ipdi_unit.nama_unit as instansi',
            'users.status',
            'users.alamat',
            'users.kode_pos',
            'users.agama',
            'users.pendidikan',
            'users.hd',
            'users.dialisis',
            'users.capd'
        );

        if (!empty($this->filterData)) {
            if (isset($this->filterData['provinsi'])) {
                $query->where('users.provinsi', $this->filterData['provinsi']);
            }

            if (isset($this->filterData['status'])) {
                $query->where('users.status', $this->filterData['status']);
            }

            if (isset($this->filterData['instansi'])) {
                $query->where('users.instansi', $this->filterData['instansi']);
            }
        }

    return $query->get();
    }

    public function headings(): array
    {
        return [
            'NIRA IPDI',
            'Nomor STR',
            'Nama Lengkap',
            'Jenis Kelamin',
            'Email',
            'Tempat & Tanggal Lahir',
            'Provinsi',
            'Instansi',
            'Status',
            'Alamat',
            'Kode Pos',
            'Agama',
            'Pendidikan',
            'Tahun Masuk HD',
            'Pelatihan Dialisis',
            'Pelatihan CAPD'
        ];
    }

    public function title(): string
    {
        return $this->sheetName;
    }
}


// use App\Exports\DataExport;
// use Maatwebsite\Excel\Facades\Excel;

// Route::get('/export', function () {
//     return Excel::download(new DataExport, 'data.xlsx');
// });
