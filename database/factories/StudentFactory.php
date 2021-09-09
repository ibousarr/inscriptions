<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            
            'prenoms'       => $this->faker->firstName,
            'nom'           => $this->faker->lastName,
            'dateNaissance' => $this->faker->dateTimeBetween("2001-01-01", "2010-12-30"),
            'lieuNaissance' => $this->faker->city,
            'sexe'          => ['M', 'F'][mt_rand(0,1)],
            'matricule'     => $this->faker->numberBetween(3,10),
            'photo'         => 'default.png',
            'provenance'    => $this->faker->name,
            'pere'          => $this->faker->name,
            'mere'          => $this->faker->name,
            'tuteur'        => $this->faker->name,
            'contact'       => $this->faker->phoneNumber,
            'adresse'       => $this->faker->address,
        ];
    }
}
