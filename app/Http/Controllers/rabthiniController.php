<?php

namespace App\Http\Controllers;

use App\Imports\rabtahunanImport;
use App\Models\noperMdl;
use App\Models\rabthnanMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class rabthiniController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $data = new rabthnanMdl;
        $data = $data->get();

        return view('admin.prosesawal.rabthini.index', compact('data', 'request'));
    }

    public function assets(Request $request)
    {

        // $data = new noperMdl;

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

        // return view('admin.prosesawal.rabthini.assets', compact('data', 'request'));
    }

    public function create()
    {
        $noper = noperMdl::all();
        return view('admin.prosesawal.rabthini.create', compact('noper'));
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'tahun' => 'required',
            'nomor_perkiraan' => 'required',
            'nama_perkiraan' => 'required',
            'rab_januari' => 'required|numeric|digits_between:0,9',
            'rab_februari' => 'required|numeric|digits_between:0,9',
            'rab_maret' => 'required|numeric|digits_between:0,9',
            'rab_april' => 'required|numeric|digits_between:0,9',
            'rab_mei' => 'required|numeric|digits_between:0,9',
            'rab_juni' => 'required|numeric|digits_between:0,9',
            'rab_juli' => 'required|numeric|digits_between:0,9',
            'rab_agustus' => 'required|numeric|digits_between:0,9',
            'rab_september' => 'required|numeric|digits_between:0,9',
            'rab_oktober' => 'required|numeric|digits_between:0,9',
            'rab_november' => 'required|numeric|digits_between:0,9',
            'rab_desember' => 'required|numeric|digits_between:0,9',
            'created_by' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $data=rabthnanMdl::where("tahun",$request->tahun)->count();
        if($data !=0){
            return back()->withErrors(['kode' => 'tahun sudah ada rab nya bisa edit rab sesuai tahun.']);
        }
        rabthnanMdl::create($request->all());
        return redirect()->route('admin.rti.index');

    }

    public function edit($id)
    {   
        $data = rabthnanMdl::find($id);
        $noper = noperMdl::all();
        return view('admin.prosesawal.rabthini.edit', compact('noper','data'));
    }

    public function detail(Request $request, $id)
    {
        $data = rabthnanMdl::find($id);

        return view('admin.prosesawal.rabthini.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tahun' => 'required|unique:rab_tahunans,tahun,' . $id,
            'nomor_perkiraan' => 'required',
            'nama_perkiraan' => 'required',
            'rab_januari' => 'required|numeric|digits_between:0,9',
            'rab_februari' => 'required|numeric|digits_between:0,9',
            'rab_maret' => 'required|numeric|digits_between:0,9',
            'rab_april' => 'required|numeric|digits_between:0,9',
            'rab_mei' => 'required|numeric|digits_between:0,9',
            'rab_juni' => 'required|numeric|digits_between:0,9',
            'rab_juli' => 'required|numeric|digits_between:0,9',
            'rab_agustus' => 'required|numeric|digits_between:0,9',
            'rab_september' => 'required|numeric|digits_between:0,9',
            'rab_oktober' => 'required|numeric|digits_between:0,9',
            'rab_november' => 'required|numeric|digits_between:0,9',
            'rab_desember' => 'required|numeric|digits_between:0,9',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors($validator);
        }

        $find = rabthnanMdl::find($id);
        $find->update($request->all());

        return redirect()->route('admin.rti.index');
    }


    public function import(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'import' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $file = $request->file('import');

        Excel::import(new rabtahunanImport, $file);
        return redirect()->back()->with('success', 'Berhasil diimport');
    }

    public function delete($id)
    {
        $data = rabthnanMdl::find($id);
        if ($data){
            DB::table('rab_tahunans')->where('id', $id)->delete();
            return redirect()->route('admin.rti.index')->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->route('admin.rti.index')->with('failed', 'Terjadi kesalahan');
        }       
    }
}