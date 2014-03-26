<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:15 PM
 */
class HistologyResultSeeder extends Seeder {

    public function run()
    {
        DB::table('histology_result')->delete();
        HistologyResult::create(array(
            "name" => "CIN 1",
            "description"=>""
        ));

        HistologyResult::create(array(
            "name" => "CIN II",
            "description"=>""
        ));

        HistologyResult::create(array(
            "name" => "CIN III",
            "description"=>""
        ));

        HistologyResult::create(array(
            "name" => "Ca insitu",
            "description"=>""
        ));

        HistologyResult::create(array(
            "name" => "Cancer",
            "description"=>""
        ));
    }

}