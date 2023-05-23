<?php

namespace App\Functions;

use Faker\Generator as Faker;
use Illuminate\Support\Arr;

class Helpers {
    public static function generateContributors(Faker $faker, int $n_persons): string{

        $result = [];

        for($i = 0; $i < $n_persons; $i++){

            $person = "{$faker->firstName()} {$faker->lastName()}";

            array_push($result, $person);

        }

        return Arr::join($result, ', ');
    }
}