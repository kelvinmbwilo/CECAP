<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 3/20/14
 * Time: 3:15 PM
 */
class InterventionResultSeeder extends Seeder {

    public function run()
    {
        DB::table('intervention_result')->delete();
        InterventionResult::create(array(
            "name" => "Follow up test after six months",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Follow up test after one year",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Follow up test after three years",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Cryotherapy",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "LEEP",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Conization",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Simple Hysterectomy",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Radical Hysterectomy",
            "description"=>""
        ));

        InterventionResult::create(array(
            "name" => "Referral to cancer institute",
            "description"=>""
        ));

    }

}