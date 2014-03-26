<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:15 PM
 */
class InterventionIndicatorSeeder extends Seeder {

    public function run()
    {
        DB::table('intervention_indicators')->delete();
        InterventionIndicators::create(array(
            "name" => "large lesion",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Large lesion beyond 2mm of Cryoprobe",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Lesion can not be seen to its entirely",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Endocervical lesion",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Advanced HIV",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Patient not reliable for follow up",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Advanced Age",
            "description"=>""
        ));

        InterventionIndicators::create(array(
            "name" => "Ca-insitu",
            "description"=>""
        ));

    }

}