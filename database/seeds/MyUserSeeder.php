<?php

use Illuminate\Database\Seeder;
use App\User;
use Carbon\Carbon;

class MyUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::insert(
            [
                [
                    'name' => 'Bryan de Oliveira Brettas',
                    'email' => 'brdebr.93@gmail.com',
                    'password' => bcrypt('asdzxc'),
                    'created_at'=> Carbon::now()->subDays(2)->subHours(3),
                    'updated_at'=> Carbon::now(),
                ],
                [
                    'name' => 'Fernando de Cera Alonso ',
                    'email' => 'falonso@test.com',
                    'password' => bcrypt('asdzxc'),
                    'created_at'=> Carbon::now()->subDays(1)->subHours(5),
                    'updated_at'=> Carbon::now(),
                ]
            ]
        );
    }
}
