@extends('layout.master')

@section('breadcumbs')
<li>
    <a href="{{ url('home') }}">Dashboard</a>
</li>

<li class="active">Reports</li>

@stop

@section('contents')
<h4>Specific Indicators</h4>
{{ Form::open(array("url"=>url("reports/process/"),"class"=>"form-horizontal","id"=>'formms')) }}
<div class='form-group' style="margin-bottom: 10px">

    <div class='col-sm-3'>
        Region<br>{{ Form::select('region',array('all'=>'all')+Region::all()->lists('region','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>
    <div class='col-sm-3'>
        District<br><span id="district-area">{{ Form::select('district',array('all'=>'all')+District::lists('district','id'),'',array('class'=>'form-control','required'=>'requiered')) }}</span>
    </div>
    <div class='col-sm-2'>
        Marital Status<br>{{ Form::select('marital',array('all'=>"All","Married"=>"Married","Cohabit"=>"Cohabit","Single-never married"=>"Single-never married","Widowed"=>"Widowed","Separated/Divorced"=>"Separated/Divorced"),'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>
    <div class='col-sm-2'>
        From:{{ Form::text('from','',array('class'=>'form-control','placeholder'=>'Start Date','required'=>'required','id'=>'from')) }}
    </div>
    <div class='col-sm-2'>
        To:{{ Form::text('to','',array('class'=>'form-control','placeholder'=>'End Date','required'=>'required','id'=>'to')) }}
    </div>
</div>
<div class='form-group'>
    <div class='col-sm-2'>
        <?php
$arrayy = array(
    "General" => "General",
    "Marital Status" => "Marital Status",
    "Contraceptive Type" => "Contraceptive Type",
    "Contraceptive History" => "Contraceptive History",
    "HIV Status" => "HIV Status",
    "CD4 Count" => "CD4 Count",
    "Decline Reason" => "Decline Reason",
    "Colposcopy Findings" => "Colposcopy Findings",
    "Colposcopy Status" => "Colposcopy Status",
    "HIV Test  Results" => "HIV Test  Results",
    "Pap Smear Findings" => "Pap Smear Findings",
    "Pap Smear Status"   => "Pap Smear Status",
    "Menarche"   => "Menarche",
    "Parity"   => "Parity",
    "Number of sexual partners"   => "Number of sexual partners",
    "Age At first Marriage"   => "Age At first Marriage",
    "Total Number of Pregnancy"   => "Total Number of Pregnancy",
    "Age At Sexual Debut"   => "Age At Sexual Debut",
);
?>
        Show<br>{{ Form::select('show',$arrayy,'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>
    <div class='col-sm-2'>
        Vertical(Y-axis)<br>{{ Form::select('vertical',array("Patients"=>"Patients","Visits"=>"Visits"),'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>
    <div class='col-sm-4'>
        Horizontal<br>{{ Form::select('horizontal',array("Year"=>"Year","Years"=>"Years","Age Range"=>"Age Range"),'',array('class'=>'form-control','required'=>'requiered')) }}
    </div>

    <div class='col-sm-4 year'>
        Year <br>{{ Form::select('year',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
    </div>
    <div class='col-sm-4 age'>
        Age Range <br>{{ Form::select('age',array_combine(range(3,10), range(3,10)),'',array('class'=>'form-control')) }}
    </div>
    <div class='col-sm-4 years'>
        <div class='col-sm-6'>
            Start <br>{{ Form::select('start',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y')-7,array('class'=>'form-control')) }}
        </div>
        <div class='col-sm-6'>
            End<br>{{ Form::select('end',array_combine(range(date('Y'),1970), range(date('Y'),1970)),date('Y'),array('class'=>'form-control')) }}
        </div>
    </div>
</div>
<div class="col-xs-12">
<button type="button" class="btn btn-info btn-sm pull-left" style="margin: 10px" id="toggleadv">Advanced Filters</button>
<button type="button" class="btn btn-info btn-sm pull-right" style="margin: 10px" id="">Save Report</button>
</div>
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
{{ Form::close() }}
<div class="col-xs-12" style="margin-top: 25px">
    <div class="col-md-2 btn btn-primary" id="table">Table</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-primary" id="bar">Bar</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-primary" id="line">Line</div>
    <div class="col-md-1"></div>
    <div class="col-md-2 btn btn-primary" id="pie">Pie</div>
</div>
<div id="chartarea" class="col-xs-12" style="margin-top: 25px">
<script>
    $(document).ready(function (){

        //hidding and showing advance filters
        $(".advancefilters").hide();
        $("#toggleadv").click(function(){
            $(".advancefilters").toggle("slow");
        })

        var year = $('.year').html();
        var years = $('.years').html();
        var age = $('.age').html();
        $(".years,.age").html("")
        $( "#from" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd",
            onClose: function( selectedDate ) {
                $( "#to" ).datepicker( "option", "minDate", selectedDate );
            }
        });
        $( "#to" ).datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat:"yy-mm-dd",
            onClose: function( selectedDate ) {
                $( "#from" ).datepicker( "option", "maxDate", selectedDate );
                if($("#from").val() != ""){
                    $("select[name=horizontal]").val("Age Range");
                    $('.year').html("");
                    $(".years").html("");
                    $('.age').html(age);
                }
            }
        });

        $("select[name=region]").change(function(){
            $("#district-area").html("<i class='fa fa-spinner fa-spin'></i> Wait... ")
            $.post("<?php echo url('patient/region_check1') ?>/"+$(this).val(),function(dat){
                $("#district-area").html(dat);
            })
        })


        $("select[name=horizontal]").change(function(){
            if($(this).val() == "Year"){
                $('.year').html(year);
                $(".years,.age").html("")
                $( "#from,#to").val("").datepicker( "refresh" );
            }else if($(this).val() == "Years"){
                $('.year,.age').html("");
                $(".years").html(years);
                $( "#from,#to").val("").datepicker( "refresh" );
            }else if($(this).val() == "Age Range"){
                $('.year,.years').html("");
                $('.age').html(age);
            }
        });

        //managing chats buttons
        $("#table").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/general/table') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });
        $("#table").trigger("click");

        $("#pie").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/general/pie') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });

        $("#bar").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/general/bar') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });

        $("#line").unbind("click").click(function(){
            $(".btn").removeClass("btn-info")
            $(this).addClass("btn-info")
            $("#chartarea").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Loading...</span><h3>");
            $("#formms").ajaxSubmit({
                url:"<?php echo url('report/general/line') ?>",
                target: '#chartarea',
                data: {chat:'table'},
                success:  afterSuccess
            });
        });
    });

    function afterSuccess(){

    }

</script>
@stop