<?php

namespace App\Http\Controllers;

use App\Models\saldoawalMdl;
use App\Imports\prosessaldoawalImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class prosessaldoawalController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {
        $debit=saldoawalMdl::where('jenis','debit')->sum('saldo_awal');
        $kredit=saldoawalMdl::where('jenis','kredit')->sum('saldo_awal');
        if($debit!=$kredit){
            $status="belum balance";
            $selisih=$debit-$kredit;
        }else{
            $status="balance";
            $selisih=0;
        }
        $data = new saldoawalMdl;
        $data = $data->get();

        return view('admin.prosesawal.prosessaldoawal.index', compact('debit', 'kredit', 'data', 'request', 'status', 'selisih'));
    }

    public function assets(Request $request)
    {

        // $data = new saldoawalMdl;

        // if ($request->get('search')) {
        //     $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
        //         ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        // }

        // if ($request->get('tanggal')) {
        //     $data = $data->where('name', 'LIKE', '%' . $request->get('search') . '%')
        //         ->orWhere('email', 'LIKE', '%' . $request->get('search') . '%');
        // }

        // $data = $data->get();

        // if ($request->get('export') == 'pdf') {
        //     $pdf = Pdf::loadView('pdf.assets', ['data' => $data]);
        //     return $pdf->stream('Data Assets.pdf');
        // }

        // return view('admin.prosesawal.prosessaldoawal.assets', compact('data', 'request'));
    }

    public function create()
    {
        return view('admin.prosesawal.prosessaldoawal.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nomor_perkiraan' => 'required|regex:/^[0-9]+(\.[0-9]+)?$/',
            'nama_perkiraan' => 'required',
            'jenis'  => 'required',
            'saldo_awal' => 'required', 
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['nomor_perkiraan'] = $request->nomor_perkiraan;
        $data['nama_perkiraan'] = $request->nama_perkiraan;
        $data['jenis'] = $request->jenis;
        $data['saldo_awal'] = $request->saldo_awal;
        $data['created_by'] = $request->created_by;
        saldoawalMdl::create($data);

        return redirect()->route('admin.psa.index');
    }

    public function edit(Request $request, $id)
    {
        $data = saldoawalMdl::find($id);
        return view('admin.prosesawal.prosessaldoawal.edit', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data = saldoawalMdl::find($id);
        return view('admin.prosesawal.prosessaldoawal.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nomor_perkiraan' => 'required|regex:/^[0-9]+(\.[0-9]+)?$/',
            'nama_perkiraan' => 'required',
            'jenis'  => 'required',
            'saldo_awal' => 'required', 
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data['nomor_perkiraan'] = $request->nomor_perkiraan;
        $data['nama_perkiraan'] = $request->nama_perkiraan;
        $data['jenis'] = $request->jenis;
        $data['saldo_awal'] = $request->saldo_awal;
        $data['created_by'] = $request->created_by;
        $find = saldoawalMdl::find($id);
        $find->update($data);

        return redirect()->route('admin.psa.index');
    }

    public function import(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'import' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $file = $request->file('import');

        Excel::import(new prosessaldoawalImport, $file);
        return redirect()->back()->with('success', 'Berhasil diimport');
    }


    public function delete($id)
    {
        $data = saldoawalMdl::find($id);
        if ($data){
            DB::table('saldo_awals')->where('id', $id)->delete();
            return redirect()->route('admin.psa.index')->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->route('admin.psa.index')->with('failed', 'Terjadi kesalahan');
        }       
    }
}
