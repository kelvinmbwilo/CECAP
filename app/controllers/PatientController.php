<?php

class PatientController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make('patient.list');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make("patient.index");
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
//		dd(Input::all());
        //adding patient basic info
        $patient = Patient::create(array(
            "first_name"  => Input::get("firstname"),
            "middle_name"   => Input::get("middlename"),
            "last_name"     => Input::get("lastname"),
            "birth_date"    => Input::get("dob"),
            "hospital_id"    => "somenumber"
        ));

        //adding patient visit info
        $visit = Visit::create(array(
            "patient_id" => $patient->id,
            "visit_date" => date('Y-m-d')
        ));

        //adding address information
        PatientInfo::create(array(
            "patient_id"        => $patient->id,
            "visit_id"          => $visit->id,
            "hospital_id"        => "somenumber",
            "region"            => Input::get("region"),
            "district"          => Input::get("district"),
            "ward"              => Input::get("ward"),
            "ten_cell_leader"   => Input::get("t_cell_leadr")
        ));

        //adding gynecological history inforamtion for a visit
        GynecologicalHistory::create(array(
            "patient_id"                => $patient->id,
            "visit_id"                  => $visit->id,
            "parity"                    => Input::get("parity"),
            "number_of_pregnancy"       => Input::get("number_of_preg"),
            "menarche"                  => Input::get("menarche"),
            "age_at_sexual_debut"       => Input::get("start_sex_age"),
            "marital_status"            => Input::get("marital"),
            "age_at_first_marriage"     => Input::get("first_marriage"),
            "sexual_partner"            => Input::get("sexual_partner"),
            "partner_sexual_partner"    => Input::get("partner_sexual_partner")

        ));

        //adding contraceptive history
        ContraceptiveHistory::create(array(
            "patient_id"                => $patient->id,
            "visit_id"                  => $visit->id,
            "previous_status"           => Input::get("ever_used_contra"),
            "current_status"            => Input::get("current_on_contra"),
            "previous_contraceptive_id" => (Input::has("ever_contra"))?Input::get("ever_contra"):"",
            "current_contraceptive_id"  => (Input::has("current_contra"))?Input::get("current_contra"):"",
        ));

        //adding HIV status
        HivStatus::create(array(
            "patient_id"                => $patient->id,
            "visit_id"                  => $visit->id,
            "status"                    =>(Input::has("hiv_status"))?Input::get("hiv_status"):"",
            "result"                    =>(Input::has("past_hiv_result"))?Input::get("past_hiv_result"):"",
            "year_of_first_diagnosis"   =>(Input::has("year_since_diagnosis"))?Input::get("year_since_diagnosis"):"",
            "last_test"                 =>(Input::has("last_test"))?Input::get("last_test"):"",
            "art_status"                =>(Input::has("art_status"))?Input::get("art_status"):"",
            "pitc_offered"              =>(Input::has("test_again"))?"yes":"no",
            "pitc_agreed"               =>(Input::has("test_again"))?Input::get("test_again"):"",
            "pitc_result"               =>(Input::has("current_test_result"))?Input::get("current_test_result"):"",
            "pitc_cd4_count"            =>(Input::has("current_cd4"))?Input::get("current_cd4"):"",
            "prev_cd4_count"            =>(Input::has("prev_cd4"))?Input::get("prev_cd4"):"",
        ));

        //adding VIA Status
        ViaStatus::create(array(
            "patient_id"                => $patient->id,
            "visit_id"                  => $visit->id,
            "via_counselling_status"    => Input::get("via_counceling"),
            "via_test_status"           => Input::get("via_test"),
            "reject_reason"             =>(Input::has("via_reason"))?Input::get("via_reason"):"",
            "via_result"                =>(Input::has("via_results"))?Input::get("via_results"):""
        ));

        //adding colposcopy
        ColposcopyStatus::create(array(
            "patient_id"    => $patient->id,
            "visit_id"      => $visit->id,
            "status"        => Input::get("colposcopy_status"),
            "result_id"     => (Input::has("colpo_result"))?Input::get("colpo_result"):""
        ));

        //adding Pap smear result
        PapsmearStatus::create(array(
            "patient_id"    => $patient->id,
            "visit_id"      => $visit->id,
            "status"        => Input::get("pap_status"),
            "result_id"     => (Input::has("pap_result"))?Input::get("pap_result"):""
        ));

        //adding intervetion status
        Intervention::create(array(
            "patient_id"        => $patient->id,
            "visit_id"          => $visit->id,
            "type_id"           => (Input::has("intervention"))?Input::get("intervention"):"",
            "indicator_id"         => (Input::has("indicator"))?Input::get("indicator"):"",
            "histology_id"         => (Input::has("histology"))?Input::get("histology"):"",
            "cancer_id"         => (Input::has("cancer"))?Input::get("cancer"):"",
            "differentiation"   => (Input::has("differentiation"))?Input::get("differentiation"):""
        ));
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

    public function check_region($id){
        return Form::select('district',Region::find($id)->district()->lists('district','id'),'',array('class'=>'form-control','required'=>'requiered'));
    }

    public function followup($id){
        $patient = Patient::find($id);
        return View::make("follow_up.index",compact("patient"));
    }
}