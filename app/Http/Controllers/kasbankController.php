<?php

namespace App\Http\Controllers;

use App\Models\kasbankMdl;

use Illuminate\Http\Request;
use App\Imports\kasbankimport;
use App\Models\noperMdl;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class kasbankController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $dt=$request->tanggal;
        if($dt !=0){
            $$data=kasbankMdl::where("tanggal",$dt)->get();// Menghitung jumlah uang untuk jenis 'Masuk'
            $jumlahMasuk =kasbankMdl::where('jenis', 'Masuk')->sum('jumlah_uang');
    
            // Menghitung jumlah uang untuk jenis 'Keluar'
            $jumlahKeluar =kasbankMdl::where('jenis', 'Keluar')->sum('jumlah_uang');
        }else{
            $data = new kasbankMdl;
            $data = $data->get();
            // Menghitung jumlah uang untuk jenis 'Masuk'
        $jumlahMasuk =kasbankMdl::where('jenis', 'Masuk')->sum('jumlah_uang');

        // Menghitung jumlah uang untuk jenis 'Keluar'
        $jumlahKeluar =kasbankMdl::where('jenis', 'Keluar')->sum('jumlah_uang');

        }

        return view('admin.dataharian.kasbank.index', compact('data', 'jumlahMasuk', 'jumlahKeluar'));
    }

    public function api($no_bukti)
    {
        $data_kas_banks = kasbankMdl::where("nomor_bukti",$no_bukti)->get();
        $jumlah=0;
        foreach($data_kas_banks as $data){
            $jumlah+=$data->jumlah_uang;
        }
        return response()->json([
            "data"=>$data_kas_banks,
            "jumlah"=>$jumlah
        ]);
    }

    public function assets(Request $request)
    {

        // $data = new kasbankMdl;

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

        // return view('admin.dataharian.kasbank.assets', compact('data', 'request'));
    }

    public function json(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'jenis' => 'required',
            'nomor_bukti' => 'required',
            'nomor_perkiraan2' => 'required',
            'nomor_perkiraan' => 'required',
            'deskripsi' => 'required',
            'ubl' => 'required',
            'jumlah_uang' => 'required',
            'created_by' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data = [
            'tanggal' => $request->tanggal,
            'jenis' => $request->jenis,
            'nomor_bukti' => $request->nomor_bukti,
            'nomor_perkiraan2' => $request->nomor_perkiraan2,
            'nomor_perkiraan' => $request->nomor_perkiraan,
            'deskripsi' => $request->deskripsi,
            'ubl' => $request->ubl,
            'jumlah_uang' => $request->jumlah_uang,
            'created_by' => $request->created_by,
        ];

        return response()->json($data);
    }

    public function create(Request $request)
    {
        $nomor_perkiraan=noperMdl::where('uraian','KAS')->orWhere('uraian', 'BANK')->get();
        // dd($request->tanggal);
        $data=$request->tanggal;
        $jenis=$request->jenis;
        // $datetime = new DateTime($data);
        // Menghapus tahun dan tanda "-"
        $no_bukti=null;
        if($data !=null){
            $dateWithoutYear = substr($data, 5);

            // Menghapus tanda "-" dari string
            $dateWithoutDashes = str_replace('-', '', $dateWithoutYear);
            $nilai=kasbankMdl::where("tanggal",$request->tanggal)->where('jenis',$jenis)->orderBy('created_at','desc')->first();
            // dd($nilai);
            if($nilai != null){
                $nb=$nilai->nomor_bukti;
                $nb_int=(int)$nb+1;
                // dd(strval($nb_int));
                $no_bukti=strval($nb_int);
            }else{
                // dd($dateWithoutDashes."001");
                $no_bukti=$dateWithoutDashes."001";
            }
        }
        return view('admin.dataharian.kasbank.create', compact('data', 'jenis', 'no_bukti', 'nomor_perkiraan'));
    }

    public function store(Request $request)
    {
        
        $validator = Validator::make($request->all(), [
            'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
            'email' => 'required|email',
            'nama'  => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['email']      = $request->email;
        $data['name']       = $request->nama;

        kasbankMdl::create($data);

        return redirect()->route('admin.kb.index');
    }

    public function edit(Request $request, $id)
    {
        $data = kasbankMdl::find($id);

        return view('admin.dataharian.kasbank.edit', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data = kasbankMdl::find($id);

        return view('admin.dataharian.kasbank.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'tanggal' => 'required',
            'jenis' => 'required',
            'nomor_bukti' => 'required',
            'nomor_perkiraan' => 'required',
            'deskripsi' => 'required',
            'ubl' => 'required',
            'jumlah_uang' => 'required',
            'created_by' => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = kasbankMdl::find($id);

        $data['tanggal'] = $request->tanggal;
        $data['jenis'] = $request->jenis;
        $data['nomor_bukti'] = $request->nomor_bukti;
        $data['nomor_bukti_lawan'] = $request->nomor_bukti_lawan;
        $data['deskripsi'] = $request->deskripsi;
        $data['ubl'] = $request->ubl;
        $data['jumlah_uang'] = $request->jumlah_uang;
        $data['created_by'] = $request->created_by;
        $find->update($data);

        return redirect()->route('admin.kb.index');
    }

    public function import(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'import' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $file = $request->file('import');

        Excel::import(new kasbankimport, $file);
        return redirect()->back()->with('success', 'Berhasil diimport');
    }

    public function delete($id)
    {
        $data = kasbankMdl::find($id);
        if ($data){
            DB::table('data_kas_banks')->where('id', $id)->delete();
            return redirect()->route('admin.kb.index')->with('success','Berhasil dihapus');
        }else{
            return redirect()->route('admin.kb.index')->with('failed','Terjadi kesalahan');
        }
    }
}