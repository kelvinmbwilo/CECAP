@extends('layout.master')

@section('breadcumbs')
<li>
    <a href="{{ url('home') }}">Dashboard</a>
</li>
<li>
    <a href="{{ url('patients') }}">patients</a>
</li>
<li class="active">Registration</li>

@stop

@section('contents')

{{ Form::open(array("url"=>url('patient/add'),"class"=>"form-horizontal","id"=>'FileUploader')) }}

    Hosptal Number {{ Form::text('hosp_no','',array('class'=>'form-control col-sm-6','placeholder'=>'Hosptal Number','required'=>'required')) }}

<div class="row">
    <div class="col-md-6" style="padding-left: 0px;padding-right: 5px">
        <h3 class="">Demographic</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                @include('patient.demograph')
            </div>
        </div>

    </div>
    <div class="col-md-6" style="padding-left: 5px;padding-right: 0px">
        <h3 class="">Gynecology History</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                @include('patient.gynocology')
            </div>
        </div>

    </div>

</div>
<div class="row">
    <h3>Contraceptive History</h3>
    @include('patient.contraceptive')

</div>

<div class="row">
    <h3>Cervical Screening</h3>
    @include('patient.cervical_screening')

</div>

<div class="row">
    <h3>HIV</h3>
    @include('patient.hiv')

</div>

<div class="row">
    <h3>VIA</h3>
    @include('patient.via')

</div>

<div class="row">
    <div class="col-md-6" style="padding-left: 0px;padding-right: 5px">
        <h3 class="">Colposcopy</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                @include('patient.colposcopy')
            </div>
        </div>

    </div>
    <div class="col-md-6" style="padding-left: 5px;padding-right: 0px">
        <h3 class="">Pap Smear</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                @include('patient.pap_smea')
            </div>
        </div>

    </div>

</div>

<div class="row">
    <h3>Intervention</h3>
    @include('patient.intervention')

</div>
<div id="output"></div>
<div class='col-sm-12 form-group text-center'>
    {{ Form::submit('Register',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
    {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
</div>
{{ Form::close() }}

<script>
    $(document).ready(function (){
        $('#FileUploader').on('submit', function(e) {
            e.preventDefault();
            $("#output").html("<h3><i class='fa fa-spin fa-spinner '></i><span>Making changes please wait...</span><h3>");
            $(this).ajaxSubmit({
                target: '#output',
                success:  afterSuccess
            });

        });

        function afterSuccess(){
<!--            $('#FileUploader').resetForm();-->
<!--            setTimeout(function() {-->
<!--                $("#output").html("");-->
<!--            }, 3000);-->
<!--            $("#listuser").load("--><?php //echo url("user/list/fgdf") ?><!--")-->
        }
    });
</script>
@stop