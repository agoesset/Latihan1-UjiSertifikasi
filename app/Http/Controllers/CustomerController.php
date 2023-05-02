<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public $customer;
    public function __construct()
    {
       $this->customer = new Customer;
    }

    public function index()
    {
        $index = Customer::all();
        return view('customer.index', compact('index'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $rules = [
            'nama'          => 'required',
            'email'         => 'required',
            'hp'            => 'required',
            'alamat'        => 'required',
            'kota'          => 'required',
            'perusahaan'    => 'required'
        ];
 
        $messages = [
            'required'      => ":attribute gak boleh kosong",
        ];
 
        $this->validate($request, $rules, $messages);
 
        $this->customer->nama = $request->nama;
        $this->customer->email = $request->email;
        $this->customer->hp = $request->hp;
        $this->customer->alamat = $request->alamat;
        $this->customer->kota = $request->kota;
        $this->customer->perusahaan = $request->perusahaan;
 
        // simpan data menggunakan method save()
        $this->customer->save();
 
        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('customer.index')->with('status', 'Data artikel berhasil ditambahkan');
    }

    public function show(Customer $customer)
    {
        //
    }

    public function edit($id)
    {
        $edit = Customer::findOrFail($id);
        return view('customer.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        $update = Customer::findOrFail($id);

        if ($update->nama == $request->nama && $update->email == $request->email 
        && $update->hp == $request->hp && $update->alamat == $request->alamat && $update->kota == $request->kota
        && $update->perusahaan == $request->perusahaan) {
            return redirect()->route('customer.index');
        } else{
            $rules = [
                'nama'          => 'required',
                'email'         => 'required',
                'hp'            => 'required',
                'alamat'        => 'required',
                'kota'          => 'required',
                'perusahaan'    => 'required'
            ];
            $messages = [
                'required'      => ":attribute gak boleh kosong",
            ];
     
            $this->validate($request, $rules, $messages);
     
            $this->customer->nama = $request->nama;
            $this->customer->email = $request->email;
            $this->customer->hp = $request->hp;
            $this->customer->alamat = $request->alamat;
            $this->customer->kota = $request->kota;
            $this->customer->perusahaan = $request->perusahaan;
    
        }
        // simpan data menggunakan method save()
        $update->customer = $request->nama;
        $update->save();
 
        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('customer.index')->with('status', 'Data kategori berhasil diedit');
    }

    public function delete($id)
    {
        $destroy = Customer::findOrFail($id);
        $destroy->delete();
        return redirect()->route('customer.index')->with('status', 'Data customer berhasil dihapus');
    }
}
