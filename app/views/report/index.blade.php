@extends('layout.master')

@section('breadcumbs')
<li>
    <a href="{{ url('home') }}">Dashboard</a>
</li>

<li class="active">Reports</li>

@stop

@section('contents')
<h4>Report Generation</h4>
<h4>Specific Indicators</h4>
<div class='form-group' style="margin-bottom: 10px">
    <div class='col-sm-3'>
        Region<br>{{ Form::select('region',Region::all()->lists('region','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>
    <div class='col-sm-3'>
        District<br><span id="district-area">{{ Form::select('district',Region::first()->district()->lists('district','id'),'',array('class'=>'form-control','required'=>'requiered')) }}</span>
    </div>
    <div class='col-sm-3'>
       Gender <br>{{ Form::select('colposcopy_status',array("All Sex","Female","Male"),'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>
    <div class='col-sm-3'>
        Age Range<br>{{ Form::select('colpo_result',array("All Ages","Write Age","2","3","4","5","6","7","8","9","10"),'',array('class'=>'form-control')) }}
    </div>
</div>

<div class='form-group'>
    <div class='col-sm-5 col-sm-offset-1'>
        From:{{ Form::text('dob','',array('class'=>'form-control','placeholder'=>'Date of Birth','required'=>'required','id'=>'Birth_Date')) }}
    </div>
    <div class='col-sm-5'>
        To:{{ Form::text('dob','',array('class'=>'form-control','placeholder'=>'Date of Birth','required'=>'required','id'=>'Birth_Date')) }}
    </div>
</div>

<div class="btn btn-info btn-sm tog" style="margin: 10px" id="toggleadv">Advanced Filters</div>
<div class="advancefilters">

<!--    Gynecological filters-->
    <h4>Gynecological History</h4>
    <div class='form-group'>
        <div class='col-sm-3'>
            Parity <br>{{ Form::select('parity',array_combine(range(1,15), range(1,15)),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            Total Number of Pregnancy<br> {{ Form::select('number_of_preg',array_combine(range(1,50), range(1,50)),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            Menarche (Years) <br> {{ Form::select('menarche',array_merge(array('Not Applicable'=>'Not Applicable'),array_combine(range(1,100), range(1,100))),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            Age At sexual Debut (years) <br> {{ Form::select('start_sex_age',array_merge(array('Not Applicable'=>'Not Applicable'),array_combine(range(1,100), range(1,100))),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
    </div>
    <div class='form-group'>
        <div class='col-sm-3'>
            Marital Status<br>{{ Form::select('marital',array("Married"=>"Married","Cohabit"=>"Cohabit","Single-never married"=>"Single-never married","Widowed"=>"Widowed","Separated/Divorced"=>"Separated/Divorced"),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            Age At first Marriage<br>{{ Form::select('first_marriage',array_merge(array('Not Applicable'=>'Not Applicable'),array_combine(range(1,100), range(1,100))),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            Number of sexual partners<br>{{ Form::select('sexual_partner',array_combine(range(1,100), range(1,100)),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            Number of your partner's sexual partners<br> {{ Form::select('partner_sexual_partner',array_combine(range(1,100), range(1,100)),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
    </div>

<!--    contraceptive History Filters-->
    <h4>Contraceptive History</h4>
    <div class='form-group'>
        <div class='col-sm-6'>
            contraceptive History<br>{{ Form::select('ever_used_contra',array('all'=>'All Patients','ever'=>'Patient Found Using Contraceptive Before Visit','during'=>'Patient Found Using Contraceptive At time of Visit'),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-6'>
            <span id="prevcontralist">Type Of Contraceptive<br>{{ Form::select('ever_contra',ContraceptiveResult::all()->lists('name','id'),'',array('class'=>'form-control')) }}</span>
        </div>
    </div>

<!--    HIV status-->
    <h4>HIV Status</h4>
    <div class='form-group'>

        <div class='col-sm-3'>
            HIV Status<br>{{ Form::select('hiv_status',array('all'=>'All','Positive'=>'Positive','Negative'=>'Negative'),'',array('class'=>'form-control','required'=>'requiered')) }}
        </div>
        <div class='col-sm-3'>
            <span id="ptic_stat">PITC Status<br> {{ Form::select('ptic_stat',array('all'=>'All','Offered And Agreed'=>'Offered And Agreed','Offered And Declined'=>'Offered And Declined','Not Offered'=>'Not Offered'),'',array('class'=>'form-control')) }}</span>
        </div>
        <div class='col-sm-3'>
            <span id="ptic_agree">ART status<br> {{ Form::select('art_status',array('all'=>'all','using'=>'On ART', 'not using'=>'Not Using ART'),'',array('class'=>'form-control')) }}</span>
        </div>
        <div class='col-sm-3'>
            <span id="cd4_stat"> CD4 (cells/mm3) <br> {{ Form::select('cd4_stat',array_combine(range(0,1500), range(0,1500)),'500',array('class'=>'form-control')) }}</span>
        </div>
    </div>

    <!--    HIV status-->
    <h4>VIA</h4>
    <div class='form-group'>

        <div class='col-sm-3'>
            VIA Counselling done?<br>{{ Form::select('via_counceling',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}
        </div>
        <div class='col-sm-3'>
            VIA test done<br>{{ Form::select('via_test',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}
        </div>
        <div class='col-sm-3'>
            why (List reasons)<br> {{ Form::select('via_reason',array('SCJ not seen'=>'SCJ not seen','Heavy menses'=>'Heavy menses','Suspicious of cancer'=>'Suspicious of cancer','Massive endocervical discharge (cervicitis)'=>'Massive endocervical discharge (cervicitis)','pregnancy'=>'pregnancy'),'',array('class'=>'form-control')) }}
        </div>
        <div class='col-sm-3'>
            what is the test results<br> {{ Form::select('via_results',array('Normal cervix (Negative)'=>'Normal cervix (Negative)','Abnormal cervix (Positive)'=>'Abnormal cervix (Positive)'),'',array('class'=>'form-control')) }}
        </div>
    </div>

</div>
@stop