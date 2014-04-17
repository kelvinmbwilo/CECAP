<?php

class BaseController extends Controller {

	/**
	 * Setup the layout used by the controller.
	 *
	 * @return void
	 */
	protected function setupLayout()
	{
		if ( ! is_null($this->layout))
		{
			$this->layout = View::make($this->layout);
		}
	}

    public function processRegion($patientquery,$visitquery,$value,$title=""){
        if($value != "all"){
            $title .= " From ". Region::find($value)->region. " Region ";
            $patientquery->whereIn('id', PatientReport::where('region',$value)->get()->lists('patient_id')+array('0'));
            $visitquery->whereIn('id', PatientInfo::where('region',$value)->get()->lists('visit_id')+array('0'));
        }
        return array($patientquery,$visitquery,$title);
    }
    public function processDistrict($patientquery,$visitquery,$value,$title=""){
        if($value != "all"){
            $title .= District::find($value)->district. " District ";
            $patientquery->whereIn('id', PatientReport::where('district',$value)->get()->lists('patient_id')+array('0'));
            $visitquery->whereIn('id', PatientInfo::where('district',$value)->get()->lists('visit_id')+array('0'));
        }
        return array($patientquery,$visitquery,$title);
    }
    public function processDaterange($patientquery,$visitquery,$title=""){
        if(Input::get('from') == "" || Input::get('to') == ""){

        }else{
            $title .= " Between ". date("M j, Y",strtotime(Input::get('from'))) ." And ". date("M j, Y",strtotime(Input::get('to')));
            $patientquery->whereBetween('created_at',array(Input::get('from'), Input::get('to')));
            $visitquery->whereBetween('created_at',array(Input::get('from'), Input::get('to')));
        }
        return array($patientquery,$visitquery,$title);
    }
    public function processMarital($patientquery,$visitquery,$value,$title=""){
        if($value != "all"){
            $title .= $value;
            $patientquery->whereIn('id', PatientReport::where('marital_status',$value)->get()->lists('patient_id')+array('0'));
            $visitquery->whereIn('id', GynecologicalHistory::where('marital_status',$value)->get()->lists('visit_id')+array('0'));
        }
        return array($patientquery,$visitquery,$title);
    }


    public function maxAge(){
        $query = Patient::all();
        $datearr = array();
        foreach($query as $patient) {
            $dat = strtotime($patient->birth_date);
            $dat1 = date("Y", $dat);
            $datearr[] = $dat1;
        }
        $len = count($datearr)-1;
        rsort($datearr,SORT_NUMERIC);
        $age  = date("Y")-$datearr[$len];
        return $age;
    }

}