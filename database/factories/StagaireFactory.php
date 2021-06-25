<?php

use Faker\Generator as Faker;

$factory->define(App\Stagaire::class, function (Faker $faker) {
    return [
                'cin'  => 'cd'.$faker->numberBetween(1111,9999),
                'nom'  => $faker->firstName,
                'prenom'  => $faker->lastName,
                'telephone'  => $faker->phoneNumber,
                'email'  => $faker->freeEmail,
                'etablisement'  => $faker->company,
                'dateDebut'  => $faker->date('Y-m-d', '1546737232'),
                'dateFin'  => '2019-10-10',
                'statut'  => $faker->randomElement($array = array ('stage','attendre','refuse','complete')),
                'photo' => 'image/coYS7gqXbpq7s8pHVVqptWUXkPHhw24JCPdlIUNx.png'
    ];
});
