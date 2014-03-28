@extends("layout.master")

@section('breadcumbs')
<li>
    <a href="{{ url('home') }}">Dashboard</a>
</li>
<li class="active">Users</li>

@stop

@section('contents')
<?php
$patient = Patient::all();

?>
<div class="row">
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="text-muted bootstrap-admin-box-title">Patients Follow Up<a href="{{ url('patient/register') }}" class="btn btn-xs btn-info pull-right">New Registration</a> </div>
        </div>
        <div class="bootstrap-admin-panel-content">
            <table class="table table-striped table-bordered" id="example">
                <thead>
                <tr>
                    <th> # </th>
                    <th> Hosptal_id </th>
                    <th> Name </th>
                    <th> Age </th>
                    <th> Region </th>
                    <th> District </th>
                    <th>Last Visit</th>
                    <th> Action </th>
                </tr>
                </thead>
                <tbody>
                <?php $i=1; ?>
                @foreach(Patient::all() as $us)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $us->hospital_id }}</td>
                    <td style="text-transform: capitalize">{{ $us->first_name }} {{ $us->middle_name }} {{ $us->last_name }}</td>
                    <td>{{ date('Y')-date('Y',strtotime($us->birth_date)) }} Yrs</td>
                    <td>{{ $us->info()->orderBy('created_at','DESC')->first()->regions->region }}</td>
                    <td>{{ $us->info()->orderBy('created_at','DESC')->first()->districts->district }}</td>
                    <td>{{ date('j M Y',strtotime($us->visit()->orderBy('created_at','DESC')->first()->visit_date)) }}</td>
                    <td id="{{ $us->id }}">
                        <a href='{{ url("patient/follow_up/{$us->id}") }}' title="View Staff log" class="userlog"><i class="fa fa-mail-forward text-success"></i> Follow Up</a>&nbsp;&nbsp;&nbsp;
                        <a href="{{ url("patients/{$us->id}") }}" title="patient Information" class="edituser"><i class="fa fa-info-circle text-info"></i> info</a>&nbsp;&nbsp;&nbsp;
                        <a href="#b" title="delete Patient" class="deleteuser"><i class="fa fa-trash-o text-danger"></i> delete</a>
                    </td>
                </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>


<!--script to process the list of users-->
<script>
    /* Table initialisation */
    $(document).ready(function() {
        $('#example').dataTable( {
            "sDom": "<'row'<'col-md-6'l><'col-md-6'f>r>t<'row'<'col-md-6'i><'col-md-6'p>>",
            "sPaginationType": "bootstrap",
            "oLanguage": {
                "sLengthMenu": "_MENU_ records per page"
            },
            "fnDrawCallback": function( oSettings ) {

                $(".deleteuser").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deleteuser").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deleteuser").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url('patient/delete') ?>/"+id1,function(data){
                            btn.hide("slow").next("hr").hide("slow");
                        });
                    });
                });//endof deleting category
            }
        });
        $('input[type="text"]').addClass("form-control");
        $('select').addClass("form-control");

    } );
</script>

@stop