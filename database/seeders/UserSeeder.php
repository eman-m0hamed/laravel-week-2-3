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
        //
        User::factory(count: 10)->create();
    //     $data = [
    //        [
    //         'name' => 'eman',
    //         'email' => 'dffg@ert.wef',
    //         'password' => 'wdfff'
    //     ] ,
    // ];

        // User::insert($data);
        // DB::table('users')->create()
    }
}
