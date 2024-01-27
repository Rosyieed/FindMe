<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->name = 'Admin';
        $user->nik = '1234567890';
        $user->no_telp = '081234567890';
        $user->no_whatsapp = '081234567890';
        $user->address = 'Jl. Jalan No. 1';
        $user->instagram = 'instagram';
        $user->facebook = 'facebook';
        $user->profile_picture = 'profile_picture';
        $user->role = 'admin';
        $user->email = 'admin@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();

        $user = new User();
        $user->name = 'User';
        $user->nik = '123456789';
        $user->no_telp = '08123456789';
        $user->no_whatsapp = '08123456789';
        $user->address = 'Jl. Jalan No. 1';
        $user->instagram = 'instagram';
        $user->facebook = 'facebook';
        $user->profile_picture = 'profile_picture';
        $user->role = 'user';
        $user->email = 'user@gmail.com';
        $user->password = bcrypt('12345678');
        $user->save();
    }
}
