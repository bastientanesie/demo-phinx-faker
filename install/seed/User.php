<?php

use Phinx\Seed\AbstractSeed;

class User extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeders is available here:
     * http://docs.phinx.org/en/latest/seeding.html
     */
    public function run()
    {
        $faker = \Faker\Factory::create('fr_FR');

        $users = [];

        for ($index = 0; $index < 10; $index++) {
            $user = [
                'idUser' => null,
                'username' => $faker->unique()->userName,
                'password' => password_hash($faker->password, PASSWORD_DEFAULT),
                'email' => $faker->unique()->email,
                'createdAt' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
            ];

            if ($faker->boolean(67) === true) {
                $user['firstName'] = $faker->firstName;
                $user['lastLame'] = $faker->lastName;
            }

            if ($faker->boolean(33) === true) {
                $user['updatedAt'] = $faker->dateTimeThisYear->format('Y-m-d H:i:s');
            }

            $users[] = $user;
        }

        $this->insert('User', $users);
    }
}
