<?php

namespace App\Exports;

use App\Pengaduan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;


class PengaduanExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array
    {
        return [
        	'Id',
        	'Tanggal Pengaduan',
        	'Judul Pengaduan',
        	'Isi Pengaduan',
        	'Foto',
        	'Status',
        	'Id User',
        ];
    }
    public function Collection()
    {
    	return Pengaduan::get(['id', 'tanggal_pengaduan', 'judul_pengaduan', 'isi_pengaduan', 'Foto', 'status', 'user_id']);
    }
}
