<?php

namespace App\Exports;

use App\Models\letterType;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;

class LetterTypeExport implements FromCollection, WithMapping, WithHeadings
{

    public function collection()
    {
        return LetterType::with('letter')->get();
    }

    public function headings() : array
    {
        return [
            "Kode Surat", "Klasifikasi Surat", "Surat Tertaut"
        ];
    }

    public function map($item) : array
    {
        return [
            $item->letter_code,
            $item->name_type,
            
        ];
    }

}
