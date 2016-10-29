# Simple demo of Phinx migration library with Faker

This repo is simply a playground for me to try [Phinx](https://github.com/robmorgan/phinx) databse migration library, with [Faker](https://github.com/fzaninotto/Faker) to make database seeding easier.

## Install

This demo requires [Composer](https://getcomposer.org/). Run `composer install` to download all required dependencies.

You also need to create a database and edit the [phinx.json](phinx.json) to your taste.

## Usage

### Migrations

To run all migration in one go, simply run `php vendor/bin/phinx migrate`.

### Seeds

To add some fake data into your database, you can use the following command :  
`php vendor/bin/phinx seed:run -s User -s Post`

The `-s User -s Post` parameters tells Phinx to explicitly run the `User` seed first, then the `Post` seed.  
We do this in order to ensure that the `User` table contains some data, so that we can use those to fullfil the foreign key `Post.idUser`.
