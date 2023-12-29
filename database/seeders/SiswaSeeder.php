<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['nama' => 'yulianto', 'kelas' => 'XI PLLG 1', 'role_status' => 'siswa', 'email' => 'anto@gmail.com', 'password' => Hash::make('amwp//63935845')]
        ];

        foreach ($data as $val){
            Siswa::insert([
                'nama' => $val['nama'],
                'kelas' => $val['kelas'],
                'role_status' => $val['role_status'],
                'email' => $val['email'],
                'password' => $val['password']
            ]);
        }
    }
}
