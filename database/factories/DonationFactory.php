<?php

namespace Database\Factories;

use App\Models\Donation;
use App\Models\Paymentmethod;
use App\Models\User;
use App\Models\Video;
use Illuminate\Database\Eloquent\Factories\Factory;

class DonationFactory extends Factory
{
    protected $model = Donation::class;

    public function definition()
    {
        return [
            'Fecha_Donacion' => $this->faker->dateTimeThisYear($max = 'now', $timezone = null),
            'Valor_Donacion' => $this->faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = NULL),

            'ID_Medio_Pago' => Paymentmethod::all()->random()->id,
            'ID_Usuario' => User::all()->random()->id,
            'ID_Video' => Video::all()->random()->id,
        ];
    }
}
