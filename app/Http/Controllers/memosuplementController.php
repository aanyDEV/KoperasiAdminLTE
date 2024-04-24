<?php

namespace App\Http\Controllers;

use App\Models\suplementMdl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class memosuplementController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {

        $data = new suplementMdl;
        $data = $data->get();

        return view('admin.dataharian.memosuplement.index', compact('data', 'request'));
    }

    public function assets(Request $request)
    {

        // $data = new User;

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

        // return view('admin.dataharian.memosuplement.assets', compact('data', 'request'));
    }

    public function create()
    {
        return view('admin.dataharian.memosuplement.create');
    }

    public function store(Request $request)
    {

        // $validator = Validator::make($request->all(), [
        //     'photo' => 'required|mimes:png,jpg,jpeg|max:2048',
        //     'email' => 'required|email',
        //     'nama'  => 'required',
        //     'password' => 'required',
        // ]);

        // if ($validator->fails()) return redirect()->back()->withInput()->withErrors($validator);

        // $photo      = $request->file('photo');
        // $filename   = date('Y-m-d') . $photo->getClientOriginalName();
        // $path       = 'photo-user/' . $filename;

        // Storage::disk('public')->put($path, file_get_contents($photo));

        // $data['email']      = $request->email;
        // $data['name']       = $request->nama;
        // $data['password']   = Hash::make($request->password);
        // $data['image']      = $filename;

        // User::create($data);

        return redirect()->route('admin.ms.index');
    }

    public function edit(Request $request, $id)
    {
        $data = suplementMdl::find($id);

        return view('admin.dataharian.memosuplement.edit', compact('data'));
    }

    public function detail(Request $request, $id)
    {
        $data = suplementMdl::find($id);

        return view('admin.dataharian.memosuplement.detail', compact('data'));
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

        $find = suplementMdl::find($id);

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

        return redirect()->route('admin.ms.index');
    }

    public function delete($id)
    {
        $data = suplementMdl::find($id);
        if ($data){
            DB::table('suplements')->where('id', $id)->delete();
            return redirect()->route('admin.ms.index')->with('success', 'Berhasil dihapus');
        }else{
            return redirect()->route('admin.ms.index')->with('failed', 'Terjadi kesalahan');
        }       
    }
}