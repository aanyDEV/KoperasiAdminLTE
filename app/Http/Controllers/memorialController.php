<?php

namespace App\Http\Controllers;

use App\Models\memorialMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use App\Imports\memorialimport;


class memorialController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index(Request $request)
    {

        $data = new memorialMdl;
        $data = $data->get();

        return view('admin.dataharian.memorial.index', compact('data', 'request'));
    }

    public function assets(Request $request)
    {

        // $data = new memorialMdl;
        // $data = $data->get();

        // if ($request->get('export') == 'pdf') {
        //     $pdf = Pdf::loadView('pdf.assets', ['data' => $data]);
        //     return $pdf->stream('Data Assets.pdf');
        // }

        // return view('admin.dataharian.memorial.assets', compact('data', 'request'));
    }

    public function create()
    {
        return view('admin.dataharian.memorial.create');
    }

    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [

            'kode'   => 'required|numeric|digits_between:0,9',
            'uraian' => 'required',
            'user'   => 'required'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $data['kode']   = $request->kode;
        $data['uraian'] = $request->uraian;
        $data['created_by'] = $request->user;

        memorialMdl::create($data);
        session()->flash('success', 'Berhasil dihapus');
        return redirect()->route('admin.mr.index');
    }

    public function edit(Request $request, $id)
    {
        $data = memorialMdl::find($id);

        return view('admin.dataharian.memorial.edit', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data = memorialMdl::find($id);

        return view('admin.dataharian.memorial.detail', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'email'     => 'required|email',
            'nama'      => 'required',
            'password'  => 'nullable',
            'photo'     => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $find = memorialMdl::find($id);

        $data['email']      = $request->email;
        $data['name']       = $request->nama;

        if ($request->password) {
            $data['password']   = Hash::make($request->password);
        }

        $photo      = $request->file('photo');

        if ($photo) {

            $filename   = date('Y-m-d') . $photo->getClientOriginalName();
            $path       = 'photo-user/' . $filename;

            if ($find->image) {
                Storage::disk('public')->delete('photo-user/' . $find->image);
            }

            Storage::disk('public')->put($path, file_get_contents($photo));

            $data['image']      = $filename;
        }

        $find->update($data);

        return redirect()->route('admin.mr.index');
    }

    public function import(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'import' => 'required|mimes:xlsx,xls,csv'
        ]);

        if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        $file = $request->file('import');

        Excel::import(new memorialimport, $file);
        return redirect()->back()->with('success', 'Berhasil diimport');
    }

    public function delete($id)
    {
        $data = memorialMdl::find($id);
        if ($data){
            DB::table('memorials')->where('id', $id)->delete();
            return redirect()->route('admin.mr.index')->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->route('admin.mr.index')->with('failed', 'Terjadi kesalahan');
        }       
    }
}