<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:15 PM
 */
class PapsmearSeeder extends Seeder {

    public function run()
    {
        DB::table('papsmear_result')->delete();
        PapsmearResult::create(array(
            "name" => "Normal",
            "description"=>""
        ));

        PapsmearResult::create(array(
            "name" => "Inflammation (cervicitis)",
            "description"=>""
        ));

        PapsmearResult::create(array(
            "name" => "LGL",
            "description"=>""
        ));

        PapsmearResult::create(array(
            "name" => "HGL",
            "description"=>""
        ));

        PapsmearResult::create(array(
            "name" => "Ca-insitu",
            "description"=>""
        ));

        PapsmearResult::create(array(
            "name" => "Carcinoma",
            "description"=>""
        ));
    }

}