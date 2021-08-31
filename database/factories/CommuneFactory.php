<?php

namespace Database\Factories;

use App\Models\Commune;
use App\Models\Region;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommuneFactory extends Factory
{
    protected $model = Commune::class;

    public function definition()
    {
        return [
            'Nombre_Comuna' => $this->faker->unique()->randomElement($array = array ('Iquique','Alto Hospicio','La Florida','Puente Alto','Lo Espejo','San Ramon','Diego de Almagro','Copiapo')),

            'ID_Region' => Region::all()->random()->id,
        ];
    }
}
