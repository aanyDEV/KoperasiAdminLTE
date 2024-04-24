<?php

namespace App\Http\Controllers;

use App\Models\noperMdl;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class noperkiraanDatatables extends Controller
{

    public function clientside(Request $request){

        $data = new noperMdl;

        if($request->get('search')){
            $data = $data->where('uraian','LIKE','%'.$request->get('search').'%')
            ->orWhere('kode','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('datatable.clientside',compact('data','request'));
    }

    public function serverside(Request $request){


        if($request->ajax()){

            $data = new noperMdl;
            $data = $data->latest();

            return DataTables::of($data)            
            ->addColumn('id',function($data){
                return $data->id;
            })
            ->addColumn('kode',function($data){
                return $data->kode;
            })
            ->addColumn('uraian',function($data){
                return $data->uraian;
            })
            ->addColumn('action',function($data){
                return '<a href="'.route('admin.np.edit',['id' => $data->id]).'" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                <a data-toggle="modal" data-target="#modal-hapus'.$data->id.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('datatable.serverside',compact('request'));
    }
}
