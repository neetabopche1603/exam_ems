<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->name = 'Administrator';
        $user->email  = 'admin@gmail.com';
        $user->student_image = 'avatar.png';
        $user->mobile = 8989898989;
        $user->stu_address = 'Balaghat';
        $user->	status = 1;
        $user->	is_admin = 1;
        $user->password = Hash::make('123456');
        $user->save();
    }
}
