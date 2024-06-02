<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SuperadminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $prefix = 'JEP';
        $date = now()->format('Ymd');
        $randomString = Str::upper(Str::random(4));

        User::create([
            'name' => 'Superadmin',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'whatsapp_no' => "8989898989",
            'userId' => "{$prefix}{$date}{$randomString}",
            'role_type' => 1
        ]);
    }
}
