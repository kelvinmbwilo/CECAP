
    <div class="panel panel-default">
      <div class="panel-body">
         {{ Form::open(array("url"=>url('facilities/add'),"class"=>"form-horizontal","id"=>'FileUploader')) }}
         <h2 class="text-center text-muted">Add new facility</h2>
          <div class='form-group'>
                <div class='col-sm-9'>
                    Facility Name <br>  {{ Form::text('firstname','',array('class'=>'form-control','placeholder'=>'Facility name','required'=>'required')) }}
                </div>
            </div>
             
            <div class='form-group'>
                <div class='col-sm-9'>
                    Region<br>{{ Form::select('region',Region::all()->lists('region','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
            </div>

            <div class='form-group'>
                <div class='col-sm-9'>
                    District<br><span id="district-area">{{ Form::select('district',Region::first()->district()->lists('district','id'),'',array('class'=>'form-control','required'=>'requiered')) }}</span>
                </div>

            </div>

          <div id="output"></div>
       <div class='col-sm-12 form-group text-center'>
            {{ Form::submit('Add User',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
              {{ Form::reset('Reset',array('class'=>'btn btn-warning','id'=>'submitqn')) }}
        </div>
      {{ Form::close() }}
    </div>
      </div>
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
                $('#FileUploader').resetForm();
                setTimeout(function() {
                    $("#output").html("");
                }, 3000);
                $("#listfacility").load("<?php echo url("facilities/list") ?>")
            }

            $("select[name=region]").change(function(){
                $("#district-area").html("<i class='fa fa-spinner fa-spin'></i> Wait... ")
                $.post("<?php echo url('patient/region_check') ?>/"+$(this).val(),function(dat){
                    $("#district-area").html(dat);
                })
            })
        });
    </script>
