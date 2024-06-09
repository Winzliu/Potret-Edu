<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\user;
use App\Models\userDetail;
use Illuminate\Support\Facades\DB;

class AdminKaryawanTambah extends Component
{
    public $name;
    public $phone_number;

    public $username;
    public $employment_date;
    public $address;
    public $password;
    public $role;
    public $description;
    public $position;
    public $custom;
    public $user_id;
    public $modalTambah = false;

    public function modal_tambah(){
        $this->modalTambah = true;
    }

    public function buatKaryawan()
    {        
        $this->modalTambah = false;


        // dd($this->address);
        $this->validate([
            'username' => 'required|string|unique:users',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|numeric|digits_between:10,14|unique:user_details',
            'employment_date' => 'required|string',
            'address' => 'required|string',
            'role' => 'required|string',        
            'position' => 'required|string',        
            'description' => 'required|string',        
            'password' => 'required|string',        
        ],
        [
            'name.required'  => 'Nama harus diisi',
            'phone_number.required'  => 'Nomor telepon harus diisi',
            'phone_number.numeric'  => 'Nomor telepon harus berupa angka',
            'phone_number.unique'  => 'Nomor telepon ini sudah ada',
            'phone_number.digits_between'  => 'Panjang nomor telepon tidak sesuai',
            'employment_date.required'  => 'Tanggal masuk kerja harus diisi',            
            'address.required'  => 'Alamat harus diisi', 
            'role.required' => 'Role harus diisi',           
            'position.required' => 'Posisi harus diisi',           
            'description.required' => 'Deskripsi harus diisi',           
            'username.required'  => 'Username harus diisi',
            'username.unique'  => 'Username ini sudah ada.',
            'password.required'  => 'Password harus diisi',
        ]);

        // dd('alwin');
        DB::beginTransaction();
        $this->employment_date = \Carbon\Carbon::createFromFormat('m/d/Y', $this->employment_date)->format('Y-m-d');
        try {
            sleep(1);
            $this->user_id = str()->uuid();
            user::create([
                'user_id' => $this->user_id,
                'username' => $this->username,
                'password' => $this->password,
                'role' => $this->role,
            ]);
            userDetail::create([
                'user_detail_id' => str()->uuid(),
                'user_id' => $this->user_id,
                'name' => $this->name,
                'custom' => 'normal',
                'position' => $this->position,
                'description' => $this->description,
                'phone_number' => $this->phone_number,
                'employment_date' => $this->employment_date,
                'address' => $this->address,
            ]);

            DB::commit();
            // Reset form fields
            $this->reset(['username', 'password', 'user_id', 'name', 'custom', 'phone_number',
            'address', 'position', 'description', 'employment_date'
        ]);
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat menambahkan karyawan!');
        }
        // Close the modal
        $this->modalTambah = false;
            request()->session()->flash('success', 'Menu berhasil ditambahkan.');
        return redirect('/admin/karyawan');
    }
    public function render()
    {
        return view('livewire.admin.admin-karyawan-tambah')
        ->layout('components.layouts.app', ['title' => 'Admin | Tambah Karyawan', 'active' => 'admin-karyawan', 'role' => 'admin']);
        ;
    }
}