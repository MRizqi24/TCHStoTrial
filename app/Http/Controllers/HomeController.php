<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\StoEntry;
use DB;
use Yajra\DataTables\Facades\DataTables;
class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function AddSto(Request $request){
        // dd($request);
        $itemcode_input = $request->itemcode_input;
        $partname_input = $request->partname_input;
        $type_input = $request->type_input;
        $quantity_input= $request->quantity_input;
        $location_input = $request->location_input;
        $user = $request->user;
        $date = date('Y-m-d H:i:s');
        // dd($date);
        $status = "ACTIVE";
        $data = array(
            'item_code' => $itemcode_input,
            'part_name' => $partname_input,
            'type' => $type_input,
            'qty'=>$quantity_input,
            'location' =>  $location_input,
            'status' =>  $status,
            'created_by' =>  $user,
            'created_date' =>  $date
        );
        // dd($data);
        DB::table('stock_opname')->insert($data);
        return response()->json(['message' => 'Record created successfully.']);
    }

    public function GetDataSto(Request $request){
        // dd($request);
        $data =StoEntry::select('item_code', 'part_name', 'type', 'location','created_by', 'qty')
    ->orderBy('created_date')
    ->get();

    return DataTables::of($data)
    ->rawColumns(['action'])
    ->editColumn('action', function ($data) {
        return view('action', ['model' => $data]);
    })
    ->make(true);

// dd($data);
    }
}
