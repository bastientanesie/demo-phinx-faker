<?php

use Phinx\Seed\AbstractSeed;

class Post extends AbstractSeed
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

        $userList = $this->fetchAll('SELECT * FROM `User`');
        $userIdList = array_column($userList, 'idUser');

        $posts = [];

        for ($index = 0; $index < 20; $index++) {
            $post = [
                'idUser' => $faker->randomElement($userIdList),
                'title' => substr($faker->sentence($faker->numberBetween(6, 12)), 0, -1), // substr pour retirer le "." à la fin de la phrase
                'content' => implode('<br />', $faker->paragraphs($faker->numberBetween(3, 8))),
                'createdAt' => $faker->dateTimeThisDecade->format('Y-m-d H:i:s'),
            ];

            if ($faker->boolean(60) === true) {
                $post['description'] = implode('<br />', $faker->sentences($faker->numberBetween(2, 3)));
            }

            if ($faker->boolean(33) === true) {
                $post['updatedAt'] = $faker->dateTimeThisYear->format('Y-m-d H:i:s');
            }

            $posts[] = $post;
        }

        $this->insert('Post', $posts);
    }
}
