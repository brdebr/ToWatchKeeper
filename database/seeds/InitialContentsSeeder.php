<?php

use Illuminate\Database\Seeder;
use App\Content;
use Carbon\Carbon;

class InitialContentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Content::insert(
            [
                [
                    'title' => 'Mision Imposible',
                    'release' => '10/11/12',
                    'synopsis' => 'Spoiler! : Al final lo consigue',
                    'type'=> 'film',
                    'infourl' => 'http://localhost/mi',
                    'created_at'=> Carbon::now()->subDays(3)->subHours(3),
                    'updated_at'=> Carbon::now(),
                ],
                [
                    'title' => 'Mision Imposible 2',
                    'release' => '20/11/12',
                    'synopsis' => 'Al final también lo consigue',
                    'type'=> 'film',
                    'infourl' => 'http://localhost/mi',
                    'created_at'=> Carbon::now()->subDays(3)->subHours(2),
                    'updated_at'=> Carbon::now(),
                ],
                [
                    'title' => 'Batman la uno',
                    'release' => '01/11/12',
                    'synopsis' => 'La primera',
                    'type'=> 'film',
                    'infourl' => 'http://localhost/mi',
                    'created_at'=> Carbon::now()->subDays(2)->subHours(8),
                    'updated_at'=> Carbon::now(),
                ],
                [
                    'title' => 'Batman la dos',
                    'release' => '01/11/12',
                    'synopsis' => 'La segunda',
                    'type'=> 'film',
                    'infourl' => 'http://localhost/mi',
                    'created_at'=> Carbon::now()->subDays(2)->subHours(4),
                    'updated_at'=> Carbon::now(),
                ],
                [
                    'title' => 'Batman la tres',
                    'release' => '01/11/12',
                    'synopsis' => 'La tercera',
                    'type'=> 'film',
                    'infourl' => 'http://localhost/mi',
                    'created_at'=> Carbon::now()->subDays(2)->subHours(1),
                    'updated_at'=> Carbon::now(),
                ],
                [
                    'title' => 'The last man on earth',
                    'release' => '01/11/12',
                    'synopsis' => 'En el primer capitulo se encuentra 2 personas',
                    'type'=> 'serie',
                    'infourl' => 'http://localhost/mi',
                    'created_at'=> Carbon::now()->subDays(2)->subHours(4),
                    'updated_at'=> Carbon::now(),
                ]
            ]
        );
    }
}
