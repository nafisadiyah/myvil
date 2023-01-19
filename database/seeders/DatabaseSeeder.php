<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use App\Models\Status;
use App\Models\Village;
use App\Models\Problem;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // Role User
        Role::create(['nama' => 'Super Admin']); // 1
        Role::create(['nama' => 'Admin Desa']); // 2
        Role::create(['nama' => 'Masyarakat']); // 3

        // User
        User::create([
            'nama' => 'Admin Ganteng',
            'email' => 'ahmad.laiq18@student.uisi.ac.id',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'role_id' => 1
        ]); // admin

        User::create([
            'nama' => 'Desa Bancar',
            'email' => 'bancar@gmail.com',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'alamat' => 'Bancar, Tuban, Jawa Timur',
            'role_id' => 2
        ]);

        User::create([
            'nama' => 'Desa Kragan',
            'email' => 'kragan@gmail.com',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'alamat' => 'Kragan, Rembang, Jawa Tengah',
            'role_id' => 2
        ]);
        // desa

        User::create([
            'nama' => 'Desa Bulu',
            'email' => 'bulu@gmail.com',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'alamat' => 'Bancar, Tuban, Jawa Timur',
            'role_id' => 2
        ]); // desa

        User::create([
            'nama' => 'Desa Karangharjo',
            'email' => 'karangharjo@gmail.com',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'alamat' => 'Kragan, Rembang, Jawa Tengah',
            'role_id' => 2
        ]); // desa

        User::create([
            'nama' => 'Ariel Noah',
            'email' => 'ariel@gmail.com',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'alamat' => 'Jl. Sultan Hasanuddin 12, Besuki, Tulungagung, Jawa Timur',
            'role_id' => 3
        ]); // masyarakat

        User::create([
            'nama' => 'John Snow',
            'email' => 'john.snow@gmail.com',
            'password' => Hash::make('Rahasia97'),
            'foto' => 'avatar-1.png',
            'alamat' => 'Jl. Sultan Hasanuddin 12, Besuki, Tulungagung, Jawa Timur',
            'role_id' => 3
        ]); // masyarakat

        /*---------------------------------------
        |   SEEDER DESA                         |
        ---------------------------------------*/

        Village::create([
            'user_id' => User::where('nama', 'Desa Bancar')->first()->id,
            'kecamatan' => 'Bancar',
            'kota' => 'Tuban',
            'provinsi' => 'Jawa Timur',
        ]);

        Village::create([
            'user_id' => User::where('nama', 'Desa Kragan')->first()->id,
            'kecamatan' => 'Kragan',
            'kota' => 'Rembang',
            'provinsi' => 'Jawa Timur',
        ]);

        Village::create([
            'user_id' => User::where('nama', 'Desa Bulu')->first()->id,
            'kecamatan' => 'Bancar',
            'kota' => 'Tuban',
            'provinsi' => 'Jawa Timur',
        ]);

        Village::create([
            'user_id' => User::where('nama', 'Desa Karangharjo')->first()->id,
            'kecamatan' => 'Kragan',
            'kota' => 'Rembang',
            'provinsi' => 'Jawa Tengah',
        ]);


        // Status
        Status::create(['nama' => 'Belum Disetujui']); // 1
        Status::create(['nama' => 'Belum Ada Solusi']); // 2
        Status::create(['nama' => 'Ditolak']); // 3
        Status::create(['nama' => 'Dalam Pengerjaan']); // 4
        Status::create(['nama' => 'Selesai']); // 5
        Status::create(['nama' => 'Disetujui']); // 6

        // Problem
        Problem::create([
            'judul' => 'Vaksinasi COVID-19',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugit vero amet animi, et nemo? Rem ducimus sequi animi aliquam quis? Debitis id, minima facere voluptate labore ad voluptatum tenetur',
            'saran' => 'Semoga lancar',
            'lampiran_1' => 'hama_padi.jpg',
            'lampiran_2' => 'hama_padi_2.jpg',
            'user_id' => 2,
            'status_id' => 1
        ]);

        Problem::create([
            'judul' => 'Banjir kali lamong',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugit vero amet animi, et nemo? Rem ducimus sequi animi aliquam quis? Debitis id, minima facere voluptate labore ad voluptatum tenetur',
            'saran' => 'Semoga mampet',
            'lampiran_1' => 'hama_padi.jpg',
            'lampiran_2' => 'hama_padi_2.jpg',
            'user_id' => 2,
            'status_id' => 2
        ]);

        Problem::create([
            'judul' => 'Sawah Banyak Tikus',
            'deskripsi' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora fugit vero amet animi, et nemo? Rem ducimus sequi animi aliquam quis? Debitis id, minima facere voluptate labore ad voluptatum tenetur',
            'saran' => 'Semoga Tikusnya mati',
            'lampiran_1' => 'hama_padi.jpg',
            'lampiran_2' => 'hama_padi_2.jpg',
            'user_id' => 2,
            'status_id' => 3
        ]);
    }
}
