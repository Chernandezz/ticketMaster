<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use App\Models\Event;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'nombre' => 'Electro Party',
                'fecha' => Carbon::create('2023', '12', '01'),
                'url_imagen' => 'https://img.freepik.com/psd-gratis/club-dj-party-flyer-publicacion-redes-sociales_505751-3058.jpg',
                'descripcion' => 'Descripción del evento 1'
            ],
            [
                'nombre' => 'Concierto de rock',
                'fecha' => Carbon::create('2023', '12', '02'),
                'url_imagen' => 'https://img.freepik.com/vector-gratis/cartel-evento-musical-foto-2021_52683-42065.jpg?w=2000',
                'descripcion' => 'Descripción del evento 2'
            ],
            [
                'nombre' => 'Concurso de baile',
                'fecha' => Carbon::create('2024', '01', '02'),
                'url_imagen' => 'https://mir-s3-cdn-cf.behance.net/project_modules/hd/9c86b893969355.5e727918c4ea4.png',
                'descripcion' => 'Descripción del evento 3'
            ],
            [
                'nombre' => 'Concierto',
                'fecha' => Carbon::create('2021', '11', '23'),
                'url_imagen' => 'https://mir-s3-cdn-cf.behance.net/project_modules/hd/abcb99135746173.61ed7d88dfc36.png',
                'descripcion' => 'Descripción del evento 4'
            ],
            [
                'nombre' => 'Pool Party',
                'fecha' => Carbon::create('2023', '10', '12'),
                'url_imagen' => 'https://cms-assets.tutsplus.com/cdn-cgi/image/width=850/uploads/users/1631/posts/32261/image/event%20flyer%20design%20template.jpg',
                'descripcion' => 'Descripción del evento 5'
            ],

        ];
        foreach ($events as $event) {
            Event::create($event);
        }
    }
}
