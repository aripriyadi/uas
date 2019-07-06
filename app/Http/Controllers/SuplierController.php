<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suplier;

class SuplierController extends Controller
{
     public function index()
    {
        $supliers = Suplier::orderBy('created_at', 'DESC')->paginate(10);
        return view('suplier.index', compact('supliers'));
    }

    public function create()
    {
        return view('suplier.add');
    }
    public function save(Request $request)
{
    //VALIDASI DATA
    $this->validate($request, [
    	'kode' => 'required|string',
        'name' => 'required|string',
        'phone' => 'required|max:13', //maximum karakter 13 digit
        'address' => 'required|string',
        //unique berarti email ditable supliers tidak boleh sama
        'email' => 'required|email|string|unique:supliers,email' // format yag diterima harus email
    ]);

    try {
        $suplier = Suplier::create([
            'kode' => $request->kode,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'email' => $request->email
        ]);
        return redirect('/suplier')->with(['success' => 'Data telah disimpan']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }
}

    public function edit($id)
{
    $suplier = Suplier::find($id);
    return view('suplier.edit', compact('suplier'));
}

public function update(Request $request, $id)
{
    $this->validate($request, [
    	'kode' => 'required|string',
        'name' => 'required|string',
        'phone' => 'required|max:13',
        'address' => 'required|string',
        'email' => 'required|email|string|exists:supliers,email'
    ]);

    try {
        $suplier = Suplier::find($id);
        $suplier->update([
        	'kode' => $request->kode,
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address
        ]);
        return redirect('/suplier')->with(['success' => 'Data telah diperbaharui']);
    } catch (\Exception $e) {
        return redirect()->back()->with(['error' => $e->getMessage()]);
    }

    //public function destroy($id)
    //{
       // $suplier = Suplier::find($id);
        //$suplier->delete();
    //    return redirect()->back()->with(['success' => '<strong>' . $suplier->kode . '</strong> Telah dihapus']);
    }
}
