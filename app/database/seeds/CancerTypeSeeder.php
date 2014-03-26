<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:41 PM
 */
class CancerTypeSeeder extends Seeder {

    public function run()
    {
        DB::table('cancer_type')->delete();
        CancerType::create(array(
            "name" => "Squamous",
            "description"=>""
        ));

        CancerType::create(array(
            "name" => "adenosquamous",
            "description"=>""
        ));

        CancerType::create(array(
            "name" => "Adenocarcinoma",
            "description"=>""
        ));
    }

}