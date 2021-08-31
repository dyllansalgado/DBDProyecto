<?php

namespace Database\Factories;

use App\Models\Paymentmethod;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaymentmethodFactory extends Factory
{
    protected $model = Paymentmethod::class;

    public function definition()
    {
        return [
            'Nombre_MedioPago'=> $this->faker->unique()->randomElement($array = array ('Visa','Mastercard','Paypal')),
        ];
    }
}
