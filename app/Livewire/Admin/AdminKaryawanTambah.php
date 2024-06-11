<?php

namespace App\Livewire\Admin;

use Illuminate\Support\Str;
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

    public function modal_tambah()
    {
        $this->modalTambah = true;
    }

    public function buatKaryawan()
    {
        $this->modalTambah = false;

        // dd($this->address);
        $this->validate(
            [
                'username'        => 'required|string|unique:users',
                'name'            => 'required|string|max:255',
                'phone_number'    => 'required|numeric|digits_between:10,14|unique:user_details',
                'employment_date' => 'required|string',
                'address'         => 'required|string',
                'role'            => 'required|string',
                'position'        => 'required|string',
                'description'     => 'required|string',
                'password'        => 'required|string|min:8',
            ],
            [
                'name.required'               => 'Harus diisi',
                'phone_number.required'       => 'Harus diisi',
                'phone_number.numeric'        => 'Harus berupa angka',
                'phone_number.unique'         => 'Sudah ada',
                'phone_number.digits_between' => 'Panjang tidak sesuai',
                'employment_date.required'    => 'Harus diisi',
                'address.required'            => 'Harus diisi',
                'role.required'               => 'Harus diisi',
                'position.required'           => 'Harus diisi',
                'description.required'        => 'Harus diisi',
                'username.required'           => 'Harus diisi',
                'username.unique'             => 'Sudah ada.',
                'password.required'           => 'Harus diisi',
                'password.min'           => 'Minimal 8 karakter',
            ]
        );

        // dd('alwin');
        DB::beginTransaction();
        $this->employment_date = date_format(date_create($this->employment_date), 'Y-m-d');
        try {
            sleep(1);
            $user_id = Str::uuid();
            user::create([
                'user_id'  => $user_id,
                'username' => $this->username,
                'password' => $this->password,
                'role'     => $this->role,
            ]);
            userDetail::create([
                'user_detail_id'  => Str::uuid(),
                'user_id'         => $user_id,
                'name'            => $this->name,
                'custom'          => 'normal',
                'position'        => $this->position,
                'description'     => $this->description,
                'phone_number'    => $this->phone_number,
                'employment_date' => $this->employment_date,
                'address'         => $this->address,
            ]);

            DB::commit();
            // Reset form fields
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
            request()->session()->flash('success', 'Karyawan berhasil ditambahkan!');
            return redirect('/admin/karyawan');
        } catch (\Exception $e) {
            DB::rollBack();
            // throw $e;
            session()->flash('error', 'Terjadi kesalahan saat menambahkan karyawan!');
        }
    }
    public function render()
    {
        return view('livewire.admin.admin-karyawan-tambah')
            ->layout('components.layouts.app', ['title' => 'Admin | Tambah Karyawan', 'active' => 'admin-karyawan', 'role' => 'admin']);
        ;
    }
}