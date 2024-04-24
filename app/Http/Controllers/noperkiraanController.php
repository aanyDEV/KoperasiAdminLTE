<?php

namespace App\Http\Controllers;

use App\Models\noperMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Imports\noperkiraanImport;

class noperkiraanController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $data = new noperMdl;
        $data = $data->get();

        return view('admin.noperkiraan.index', compact('data', 'request'));
    }

    public function assets(Request $request)
    {
        // $data = new noperMdl;
        // $data = $data->get();

        // if ($request->get('export') == 'pdf') {
        //     $pdf = Pdf::loadView('pdf.assets', ['data' => $data]);
        //     return $pdf->stream('Data Assets.pdf');
        // }

        // return view('admin.noperkiraan.assets', compact('data', 'request'));
    }

    public function create()
    {
        return view('admin.noperkiraan.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'kode'   => 'required|numeric|gt:0',
            'uraian' => 'required',
            'user'   => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['kode']   = $request->kode;
        $data['uraian'] = $request->uraian;
        $data['created_by'] = $request->user;

        noperMdl::create($data);
        session()->flash('success', 'Berhasil dihapus');
        return redirect()->route('admin.np.index');
    }

    public function edit(Request $request, $id)
    {
        $data = noperMdl::find($id);

        return view('admin.noperkiraan.edit', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data = noperMdl::find($id);

        return view('admin.noperkiraan.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kode'   => 'required|numeric|gt:0',
            'uraian' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = noperMdl::find($id);
        $data['kode']   = $request->kode;
        $data['uraian'] = $request->uraian;
        $find->update($data);

        return redirect()->route('admin.np.index');
    }

    public function import(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'import' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $file = $request->file('import');

        Excel::import(new noperkiraanImport, $file);
        return redirect()->back()->with('success', 'Berhasil diimport');
    }

    public function delete($id)
    {
        $data = noperMdl::find($id);
        if ($data){
            DB::table('nomor_perkiraans')->where('id', $id)->delete();
            return redirect()->route('admin.np.index')->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->route('admin.np.index')->with('failed', 'Terjadi kesalahan');
        }
    }
}