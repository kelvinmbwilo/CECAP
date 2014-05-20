
<div class="row">
<div class="panel panel-default">
<div class="panel-heading">
    <div class="text-muted bootstrap-admin-box-title">System Facilities</div>
</div>
<div class="bootstrap-admin-panel-content">
    <?php
    if(Facility::all()->count() == 0){
        echo "<h3>No Facilities Defined</h3>";
    }else{
    ?>
<table class="table table-striped table-bordered" id="example">
<thead>
<tr>
    <th> # </th>
    <th> Name </th>
    <th> Region </th>
    <th> District </th>
    <th> Action </th>
</tr>
</thead>
<tbody>
<?php $i=1;
?>
@foreach(Facility::all() as $us)
<tr>
    <td>{{ $i++ }}</td>
    <td style="text-transform: capitalize">{{ $us->facility_name }}</td>
    <td>{{ Region::find($us->region)->region }}</td>
    <td>{{ District::find($us->district)->district }}</td>
    <td id="{{ $us->id }}">
        <a href="#edit" title="edit User" class="editfacility"><i class="fa fa-pencil text-info"></i> edit</a>&nbsp;&nbsp;&nbsp;
        <a href="#b" title="delete User" class="deletefacility"><i class="fa fa-trash-o text-danger"></i> </a>
    </td>
</tr>
@endforeach

</tbody>
</table>
   <?php } ?>
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
                //editing a room
                $(".editfacility").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $("#addfacility").html("<br><i class='fa fa-spinner fa-spin'></i>loading...");
                    $("#addfacility").load("<?php echo url("facilities/edit") ?>/"+id1);
                })

                $(".deletefacility").click(function(){
                    var id1 = $(this).parent().attr('id');
                    $(".deletefacility").show("slow").parent().parent().find("span").remove();
                    var btn = $(this).parent().parent();
                    $(this).hide("slow").parent().append("<span><br>Are You Sure <br /> <a href='#s' id='yes' class='btn btn-success btn-xs'><i class='fa fa-check'></i> Yes</a> <a href='#s' id='no' class='btn btn-danger btn-xs'> <i class='fa fa-times'></i> No</a></span>");
                    $("#no").click(function(){
                        $(this).parent().parent().find(".deletefacility").show("slow");
                        $(this).parent().parent().find("span").remove();
                    });
                    $("#yes").click(function(){
                        $(this).parent().html("<br><i class='fa fa-spinner fa-spin'></i>deleting...");
                        $.post("<?php echo url('facilities/delete') ?>/"+id1,function(data){
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
