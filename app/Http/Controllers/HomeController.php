<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\StoEntry;
use App\Models\MasterItemCode;
use App\Exports\ExportSTO;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\User;
use DB;
use Auth;
use Yajra\DataTables\Facades\DataTables;
use PDF;
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
        $partnumber_input = $request->partnumber_input;
        $type_input = $request->type_input;
        $quantity_input= $request->quantity_input;
        $location_input = $request->location_input;
        $user = $request->user;
        // new
        $no_tag_input = $request->no_tag_input;
        $gudang_input = $request->gudang_input;
        $keterangan_input = $request->keterangan_input;

        $date = date('Y-m-d');
        // dd($date);
        $status = "ACTIVE";
        //insert stock opaname
        $data = array(
            'item_code' => $itemcode_input,
            'part_name' => $partname_input,
            'part_number' => $partnumber_input,
            'type' => $type_input,
            'qty'=>$quantity_input,
            'location' =>  $location_input,
            'status' =>  $status,
            'created_by' =>  $user,
            'no_tag' =>  $no_tag_input,
            'gudang' =>  $gudang_input,
            'keterangan' =>  $keterangan_input,
            'created_date' =>  $date
        );

        //menambahkan nilai qty master item code
        // MasterItemCode::
        //     where('ITEMCODE',$itemcode_input)
        //     ->increment('OPNAME_QTY', $quantity_input);

        // // dd($data);

        $check_data = $result = StoEntry::select('item_code')->where('item_code',$itemcode_input)->first();


        $result = StoEntry::create($data);
    //    $result = DB::table('stock_opname')->insert($data);
    //    dd($result);
        return response()->json($result->id);
    }

    public function GetDataSto(Request $request){
        // dd($request);


        $auth = Auth::user()->name ;
        $data_user = User::select('role')
        ->where ('name',$auth) ->first();

        $role = $data_user->role;
        if($role == 'Guest'){
            $data =StoEntry::select('item_code', 'part_name', 'part_number', 'type', 'location','created_by', 'qty', 'created_date', 'no_tag', 'gudang', 'keterangan')
        ->where('created_by',$auth)
        ->orderBy('created_date')
        ->get();
        }else{
            $data =StoEntry::select('item_code', 'part_name', 'part_number', 'type', 'location','created_by', 'qty', 'created_date', 'no_tag', 'gudang', 'keterangan')
        ->orderBy('created_date')
        ->get();
        }
        // dd($role);



    return DataTables::of($data)
    ->rawColumns(['action'])
    ->editColumn('action', function ($data) {
        return view('action', ['model' => $data]);
    })
    ->make(true);
    }

    public function GetMasterItemCode(){
        $part_name = MasterItemCode::select(
            'ITEMCODE',
            'DESCRIPT',
            'PART_NO',
            'DESCRIPT1',
            'NO_TAG'
            )
            ->get();
            // dd($part_name);
        return DataTables::of($part_name)
        ->addIndexColumn()
        ->make();
    }

    public function SearchDataSto($itemcode){
        $petik ='"';
        $itemcode = str_replace($petik,".",$itemcode);
        $itemcode = str_replace(".",".",$itemcode);
        // dd($itemcode);

        $item_code_result = MasterItemCode::select('ITEMCODE','DESCRIPT','DESCRIPT1','PART_NO','NO_TAG')->where('ITEMCODE',$itemcode)->first();
        // dd($item_code_result);
        return $item_code_result;

    }

    public function print_pdf($id){
// dd($id);
        $result = StoEntry::where('id',$id)
        ->select('item_code','part_name','part_number','location','qty','created_by','created_date')
        ->first();
        // dd($result);
        return view('print', ['result' => $result]);
    }

    public function checkData(Request $request)
    {
        // dd('masuk');

        $auth = Auth::user()->name ;
        $data_user = User::select('role')->where ('name',$auth) ->first();
        $role = $data_user->role;

        // dd($auth, $role);

        if($role == 'Admin'){
            // dd('admin');
            $data = StoEntry::orderBy('created_date', 'ASC')->get();
        } else {
            $data = StoEntry::where('created_by', $auth)->orderBy('created_date', 'ASC')->get();
        }

        // dd($data);
        if ($data->isEmpty()) {
            return response()->json(['status' => 100, 'message' => 'Data Not Found']);
        } else {
            return response()->json(['role' => $role, 'data' => 'all', 'status' => 200, 'message' => 'Data Not Exist']);
        }
    }

    public function reportexcel(Request $request, $data)
    {
        // dd($data);

        // $data = explode("_",$data);

        return Excel::download(new ExportSTO(), 'DataStockOpname.xlsx');
    }

}
