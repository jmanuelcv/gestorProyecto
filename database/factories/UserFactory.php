<?php

namespace Database\Factories;
use App\Models\usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    public function definition()
    {
        /* Se definen los datos para los registros */
        return [
            'nombre' => $this->faker->randomElement( ['Juan', 'paco', 'pepe','manuel','Jose','Manuela','Laura']),
            'email' => $faker->unique()->email,
            'password' => "123456",
           
            'rol' => $this->faker->randomElement( ['Admin', 'Recursos', 'Ventas']),
            'estado' => 0,

        
        ];
    }
}
