<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class CustomerController extends Controller
{
    public $customer;
    // Membuat objek baru dari kelas Costumer
    public function __construct()
    {
       $this->customer = new Customer;
    }


    public function dashboard()
    {
        //untuk menghitung total customer dari semua kota asal
        $total = Customer::count();
        //untuk menghitung total customer dari setiap kota asal
        $perkota = Customer::groupBy('kota')->select('kota', DB::raw('count(*) as total'))->get();

        return view('dashboard', compact('total', 'perkota'));
    }

    public function index()
    {
        //untuk menampilkan semua data customer
        $index = Customer::all();
        return view('customer.index', compact('index'));
    }

    public function create()
    {
        //mengarahkan ke halaman tambah customer
        return view('customer.create');
    }

    public function store(Request $request)
    {
        //fungsi untuk menyimpan data baru customer
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
        //untuk mengarahkan ke halaman edit data customer sesuai dengan id yang dipilih
        $edit = Customer::findOrFail($id);
        return view('customer.edit', compact('edit'));
    }

    public function update(Request $request, $id)
    {
        //fungsi untuk mengupdate data customer yang diedit
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
        $update->nama = $request->nama;
        $update->email = $request->email;
        $update->hp = $request->hp;
        $update->alamat = $request->alamat;
        $update->kota = $request->kota;
        $update->perusahaan = $request->perusahaan;
        $update->save();
 
        // redirect halaman serta kirimkan pesan berhasil
        return redirect()->route('customer.index')->with('status', 'Data kategori berhasil diedit');
    }

    public function delete($id)
    {
        //fungsi untuk menghapus data customer dengan id yang dipilih
        $destroy = Customer::findOrFail($id);
        $destroy->delete();
        return redirect()->route('customer.index')->with('status', 'Data customer berhasil dihapus');
    }
}
