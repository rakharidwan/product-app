<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $admin = Admin::create([
            'nama_depan' => 'Rakha',
            'nama_belakang' => 'Ridwan',
            'jenis_kelamin' => 'L',
            'email' => 'rakhardwan@gmail.com',
            'tanggal_lahir' => '2003-05-08',
            'password' => Hash::make('`12qwaszx')
        ]);
    }
}
