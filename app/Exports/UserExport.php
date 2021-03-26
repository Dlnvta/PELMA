<?php

namespace App\Exports;

use App\User;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UserExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function headings():array
    {
        return [
        	'id',
        	'Nama',
        	'NIK',
        	'Email',
        	'Email Verifikasi',
        	'No Telp',
        	'Tanggal didaftar',
        ];
    }
    public function Collection()
    {
    	return User::get(['id', 'name', 'nik', 'email', 'email_verified_at', 'telp', 'created_at']);
    }
}
