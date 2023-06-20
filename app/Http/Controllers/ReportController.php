<?php

namespace App\Http\Controllers;
use Yajra\DataTables\Facades\DataTables;
use App\Models\StoEntry;
use App\Models\MasterItemCode;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(){
        return view ('report');
    }


public function checkData(Request $request )
{
    // dd($request);
    $itemcode = $request->itemcode_input;
    $partname = $request->partname_input;
    $from_date = $request->From_Date;
    $to_date = $request->To_Date;
    // dd($request);
    // $data = StoEntry::where('item_code', '=', $itemcode)
    // ->select('item_code')


    $data = StoEntry::when($itemcode != "PILIH", function ($q) use ($itemcode) {
        $q->where('item_code', '=', $itemcode);
    })
        ->when($partname != "PILIH", function ($q) use ($partname) {
            $q->where('part_name', '=', $partname);
        })
        ->when($partname != "PILIH", function ($q) use ($from_date, $to_date) {
            // $q->where('voided', '=', NULL);
            // $q->where('type_machine', '=', $type);
            $q->whereBetween('created_date', [$from_date, $to_date]);
        })
        // ->when($type != "", function ($q) use ($type) {
        //     $q->where('type_machine', '=', $type);
        // })
        ->whereBetween('created_date', [$from_date, $to_date])
        ->orderBy('created_date', 'ASC')
        ->get();
    // dd($data);
    if ($data->isEmpty()) {
        return response()->json(['status' => 100, 'message' => 'Data Not Found']);
    } else {
        return response()->json(['data' => $data, 'status' => 200, 'message' => 'Data Not Exist']);
    }
}

}
