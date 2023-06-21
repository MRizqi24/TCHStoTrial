<?php

namespace App\Exports;
use App\Models\StoEntry;

use Maatwebsite\Excel\Concerns\FromCollection;


class ExportSTO implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //atribut
    protected $item_code;
    protected $from_date;

    //inisialisasi fungsi otomatis berjalan
    function __construct($itemcode) {
        //memasukkan data ke atribut
        $this->item_code = $itemcode;


    }

    public function collection()
    {

        return $data =StoEntry::
        where('created_by',$this->item_code)
        ->orderBy('created_date')
        ->get();

    }
}
