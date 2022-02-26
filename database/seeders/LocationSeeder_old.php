<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\Models\Location;
use App\Models\Post;
use App\Models\Image;

class LocationSeeder extends Seeder
{
    public function run() {
        $sedes = [
            [
                'name'        => 'Sede A',
                'slug'        => Str::slug('Sede A'),
                'description' => 'Contamos con educación media y básica secundaria. Jornada mañana de 6:30am a 12:15pm Jornada tarde de 12:20pm a 6:00pm',
                'image'       => 'galeria/sedea/presentacion.png',
                'direction'   => 'Carrera 18T #65A - 27 Sur',
                'phone'       => '718 78 45',
                'opens'       => '6:00 am',
                'closes'      => '6:00 pm'
            ],
            [
                'name'        => 'Sede B',
                'slug'        => Str::slug('Sede B'),
                'description' => 'Contamos con educación primaria y pre-escolar. Jornada mañana de 6:30am a 12:15pm Jornada tarde de 12:20pm a 5:00 pm',
                'image'       => 'galeria/sedeb/presentacion.png',
                'direction'   => 'Carrera 18X #68A - 02 Sur',
                'phone'       => '717 23 63',
                'opens'       => '6:30 am',
                'closes'      => '5:00 pm'
            ],
            [
                'name'        => 'Sede C',
                'slug'        => Str::slug('Sede C'),
                'description' => 'Contamos con educación primaria y pre-escolar. Jornada mañana de 6:30am a 12:15pm Jornada tarde de 12:20pm a 5:00 pm',
                'image'       => 'galeria/sedec/presentacion.png',
                'direction'   => 'Carrera 18P #67C – 21 Sur',
                'phone'       => '790 58 44',
                'opens'       => '6:30 am',
                'closes'      => '5:00 pm'
            ],
            [
                'name'        => 'Todas',
                'slug'        => Str::slug('Todas'),
                'description' => 'Colegio SantaBarbara',
                'image'       => 'empty.png',
                'direction'   => 'Carrera 18T #65A - 27 Sur',
                'phone'       => '718 78 45',
                'opens'       => '6:00 am',
                'closes'      => '6:00 pm'
            ]
        ];

        foreach ($sedes as $sede) {
            Location::factory(1)->create($sede)->each(function (Location $sede) {
                $post = Post::factory(5)->create([
                    'user_id' => 1
                ])->each(function (Post $post) {
                    Image::factory(3)->create([
                        'imageable_id' => $post->id,
                        'imageable_type' => Post::class
                    ]);
                });
            });
        }
    }
}
