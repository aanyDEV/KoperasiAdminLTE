<?php

namespace App\Http\Controllers;

use App\Models\rabthnanMdl;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Http\Request;

class rabthiniDatatables extends Controller
{

    public function clientside(Request $request){

        $data = new rabthnanMdl;

        if($request->get('search')){
            $data = $data->where('nomor_perkiraan','LIKE','%'.$request->get('search').'%')
            ->orWhere('tahun','LIKE','%'.$request->get('search').'%')
            ->orWhere('nama_perkiraan','LIKE','%'.$request->get('search').'%')
            ->orWhere('created_by','LIKE','%'.$request->get('search').'%');
        }

        $data = $data->get();

        return view('datatable.clientside',compact('data','request'));
    }

    public function serverside(Request $request){


        if($request->ajax()){

            $data = new rabthnanMdl;
            $data = $data->latest();

            return DataTables::of($data)
            ->addColumn('id',function($data){
                return $data->id;
            })
            ->addColumn('tahun',function($data){
                return $data->tahun;
            })
            ->addColumn('nomor_perkiraan',function($data){
                return $data->nomor_perkiraan;
            })
            ->addColumn('nama_perkiraan',function($data){
                return $data->nama_perkiraan;
            })
            ->addColumn('rab_januari',function($data){
                return $data->rab_januari;
            })
            ->addColumn('rab_februari',function($data){
                return $data->rab_februari;
            })
            ->addColumn('rab_maret',function($data){
                return $data->rab_maret;
            })
            ->addColumn('rab_april',function($data){
                return $data->rab_april;
            })
            ->addColumn('rab_mei',function($data){
                return $data->rab_mei;
            })
            ->addColumn('rab_juni',function($data){
                return $data->rab_juni;
            })
            ->addColumn('rab_juli',function($data){
                return $data->rab_juli;
            })
            ->addColumn('rab_agustus',function($data){
                return $data->rab_agustus;
            })
            ->addColumn('rab_september',function($data){
                return $data->rab_september;
            })
            ->addColumn('rab_oktober',function($data){
                return $data->rab_oktober;
            })
            ->addColumn('rab_november',function($data){
                return $data->rab_november;
            })
            ->addColumn('rab_desember',function($data){
                return $data->rab_desember;
            })
            ->addColumn('action',function($data){
                return '<a href="'.route('admin.rti.edit',['id' => $data->id]).'" class="btn btn-primary"><i class="fas fa-pen"></i> Edit</a>
                <a data-toggle="modal" data-target="#modal-hapus'.$data->id.'" class="btn btn-danger"><i class="fas fa-trash-alt"></i> Hapus</a>';
            })
            ->rawColumns(['action'])
            ->make(true);
        }

        return view('datatable.serverside',compact('request'));
    }
}