<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 1:25 PM
 */
class UserTableSeeder extends Seeder {

    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            "firstname" => "kelvin",
            "middlename"=>"kulwa",
            "lastname"=>"mbwilo",
            "email"=>"kelvinmbwilo@gmail.com",
            "password"=>"kevdom",
            "phone"=>"0717524556",
            "status"=>"active",
            "role"=>"admin",
        ));

    }

}