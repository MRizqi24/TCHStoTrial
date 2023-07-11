<?php

namespace App\Exports;
use App\Models\StoEntry;
// use Illuminate\Support\Facades\Auth;
use Auth;

use Maatwebsite\Excel\Concerns\FromCollection;


class ExportSTO implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */

    //atribut
    protected $item_code;
    protected $from_date;
    protected $to_date;

    //inisialisasi fungsi otomatis berjalan
    function __construct() {
        //memasukkan data ke atribut

        // $this->item_code = $data[0];
        // $this->from_date = $data[2];
        // $this->to_date = $data[3];


    }

    public function collection()
    {
        //memasukkan data dari  atribut yang sudah di simpan datanya dan data dari Auth
        // $item_code = $this->item_code;
        // $from_date = $this->from_date;
        // $to_date = $this->to_date;
        $role = Auth::user()->role ;
        $name = Auth::user()->name ;
        // dd($item_code);


        if ($role == 'Admin') { //jika admin dapat export semua data user
            return $data = StoEntry::
            // where('item_code', '=', $item_code)
            // ->whereBetween('created_date', [$from_date, $to_date])
           orderBy('created_date')
            ->get();

        } else { //jika user biasa hanya dapat export data sendiri
            return $data =StoEntry::
            // where('item_code', '=', $item_code)
            where('created_by', '=', $name)
            ->orderBy('created_date')
            ->get();
        }



    }
}
