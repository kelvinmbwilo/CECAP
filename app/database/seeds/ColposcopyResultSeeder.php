<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:15 PM
 */
class ColposcopyResultSeeder extends Seeder {

    public function run()
    {
        DB::table('colposcopy_result')->delete();
        ColposcopyResult::create(array(
            "name" => "Normal cervix",
            "description"=>""
        ));

        ColposcopyResult::create(array(
            "name" => "Squoous metaplasia",
            "description"=>""
        ));

        ColposcopyResult::create(array(
            "name" => "LGL",
            "description"=>""
        ));

        ColposcopyResult::create(array(
            "name" => "HGL",
            "description"=>""
        ));

        ColposcopyResult::create(array(
            "name" => "Suspicious of cancer",
            "description"=>""
        ));

    }

}