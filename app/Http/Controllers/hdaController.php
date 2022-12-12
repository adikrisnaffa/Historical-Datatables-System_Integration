<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\hda;
use Yajra\DataTables\Facades\DataTables;

class hdaController extends Controller
{
    public function index(Request $request){
        $dataSel = hda::select('ItemID')->get();
        
        return view('integration_object.index', [
            'dataSel' => $dataSel
        ]);
    }

    public function getData(Request $request, $idx = 0)
    {
        if($request->ajax()) {
            
            if($idx != 0) {
                $data = hda::where([['ItemID', 'LIKE', '%'.$idx.'%']])->get();
            }

            else {
                $data = hda::get();
            }
        }

        return DataTables::of($data)
                    ->addIndexColumn()
                    ->addColumn('itemId', function($row) {
                        $id = explode('"."', $row->ItemID);
                        $codeName = explode(':', $id[2]);
                        return isset($codeName[3]) ? $codeName[3] : '';
                    })
                    ->addColumn('ItemQuality', function($row) {
                        $quality = explode(',', substr($row->ItemQuality, 10));
                        return isset($quality[0]) ? $quality[0] : '';
                    })
                    ->make(true);
    }
       
}