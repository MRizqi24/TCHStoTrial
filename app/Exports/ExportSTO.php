<?php

namespace App\Exports;
use App\Models\StoEntry;
use Illuminate\Support\Facades\Auth;

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
        // dd($this->item_code);
        $name = $this->item_code;
        $role = Auth::user()->role ;
        // dd($role);

        if ($role == 'Admin') {
            // dd('tarik semua');
            return $data = StoEntry::
            // where('created_by',$this->item_code)
            orderBy('created_date')
            ->get();
        } else {
            // dd('sesuaikan');
            return $data =StoEntry::
            where('created_by', '=', $name)
            ->orderBy('created_date')
            ->get();
        }

        // dd($data);
        // return $data =StoEntry::
        // where('created_by', '=', $name)
        // ->orderBy('created_date')
        // ->get();


        // return $data =StoEntry::
        // where('created_by',$this->item_code)
        // ->orderBy('created_date')
        // ->get();

    }
}
