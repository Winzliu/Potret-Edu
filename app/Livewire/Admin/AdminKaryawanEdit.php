<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\user;
use App\Models\userDetail;
use Illuminate\Support\Facades\DB;

class AdminKaryawanEdit extends Component
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
    public $karyawan_id;
    public $karyawanDetail;
    public $employees;
    public $modalTambah = false;

    public function modal_tambah()
    {
        $this->modalTambah = true;
    }
    public function mount()
    {
        $this->karyawan_id = request('id_karyawan');
        // $this->menu_categories = menuCategory::all();
        if ($this->karyawan_id) {
            $karyawan = user::findOrFail($this->karyawan_id);
            $this->username = $karyawan->username;
            $this->user_id = $karyawan->user_id;
            $this->password = '';
            $this->role = $karyawan->role;
            $this->custom = $karyawan->custom;
            $this->employment_date = date_format(date_create($karyawan->userDetail->employment_date), 'M-d-Y');
            $this->name = $karyawan->userDetail->name;
            $this->position = $karyawan->userDetail->position;
            $this->description = $karyawan->userDetail->description;
            $this->address = $karyawan->userDetail->address;
            $this->phone_number = $karyawan->userDetail->phone_number;
        }
    }

    public function editKaryawan()
    {
        // dd($this->karyawan_id);
        $this->modalTambah = false;
        $this->employee = user::findOrFail($this->karyawan_id);
        $rules = [
            'name'            => 'required|string|max:255',
            'employment_date' => 'required|string',
            'address'         => 'required|string',
            'role'            => 'required|string',
            'position'        => 'required|string',
            'description'     => 'required|string',
            'password'        => 'required|string',
        ];
        if ($this->username !== $this->employee->username) {
            $rules['username'] = 'required|string|unique:users';
        } else {
            $rules['username'] = 'required|string';
        }
        if ($this->phone_number !== $this->employee->userDetail->phone_number) {
            $rules['phone_number'] = 'required|numeric|digits_between:10,14|unique:user_details';
        } else {
            $rules['phone_number'] = 'required|numeric|digits_between:10,14';
        }

        $this->validate($rules, [
            'name.required'               => 'Nama harus diisi',
            'phone_number.required'       => 'Nomor telepon harus diisi',
            'phone_number.numeric'        => 'Nomor telepon harus berupa angka',
            'phone_number.unique'         => 'Nomor telepon ini sudah ada',
            'phone_number.digits_between' => 'Panjang nomor telepon tidak sesuai',
            'employment_date.required'    => 'Tanggal masuk kerja harus diisi',
            'address.required'            => 'Alamat harus diisi',
            'role.required'               => 'Role harus diisi',
            'position.required'           => 'Posisi harus diisi',
            'description.required'        => 'Deskripsi harus diisi',
            'username.required'           => 'Username harus diisi',
            'username.unique'             => 'Username ini sudah ada.',
            'password.required'           => 'Password harus diisi',
        ]);
        // dd($this->position);
        DB::beginTransaction();
        $this->employment_date = date_format(date_create($this->employment_date), 'Y-m-d');
        try {
            sleep(1);
            user::where('user_id', $this->karyawan_id)->update([
                'user_id'  => $this->user_id,
                'username' => $this->username,
                'password' => $this->password,
                'role'     => $this->role,
            ]);
            userDetail::where('user_detail_id', $this->karyawan_id)->update([
                'user_detail_id'  => str()->uuid(),
                'name'            => $this->name,
                'custom'          => 'normal',
                'position'        => $this->position,
                'description'     => $this->description,
                'phone_number'    => $this->phone_number,
                'employment_date' => $this->employment_date,
                'address'         => $this->address,
            ]);
            // dd($this->position);
            DB::commit();
            $this->reset([
                'username',
                'password',
                'user_id',
                'name',
                'custom',
                'phone_number',
                'address',
                'position',
                'description',
                'employment_date'
            ]);
            // Close the modal
            $this->modalTambah = false;
            request()->session()->flash('success', 'Berhasil mengedit karyawan!');
            return redirect('/admin/karyawan');
            // Reset form fields

        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
            session()->flash('error', 'Terjadi kesalahan saat mengedit karyawan!');
        }

    }

    public function refresh()
    {
        'refresh';
    }
    public function render()
    {
        return view('livewire.admin.admin-karyawan-edit')
            ->layout('components.layouts.app', ['title' => 'Admin | Edit Karyawan', 'active' => 'admin-karyawan', 'role' => 'admin']);
        ;
    }
}