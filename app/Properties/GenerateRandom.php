<?php

namespace App\Properties;

class GenerateRandom
{
    public static function email()
    {
        // generate random email
        $faker = \Faker\Factory::create();
        return $faker->email;
    }

    public static function password()
    {
        // generate random password
        $faker = \Faker\Factory::create();
        return $faker->password;
    }
}
