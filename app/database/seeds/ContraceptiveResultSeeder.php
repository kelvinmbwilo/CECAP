<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:15 PM
 */
class ContraceptiveResultSeeder extends Seeder {

    public function run()
    {
        DB::table('contraceptive_results')->delete();
        ContraceptiveResult::create(array(
            "name" => "Depo provera",
            "description"=>""
        ));
        ContraceptiveResult::create(array(
            "name" => "COC",
            "description"=>""
        ));
        ContraceptiveResult::create(array(
            "name" => "Implants",
            "description"=>""
        ));
        ContraceptiveResult::create(array(
            "name" => "IUCD/Mirena",
            "description"=>""
        ));

    }

}