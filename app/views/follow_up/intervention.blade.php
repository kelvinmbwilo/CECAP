<div class="col-md-12" style="padding-left: 5px;padding-right: 0px">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class='form-group'>

                <div class='col-sm-4'>
                    Intervention done<br>{{ Form::select('intervention',InterventionResult::all()->lists('name','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
                <div class='col-sm-4'>
                    Specific indication <br>{{ Form::select('indicator',InterventionIndicators::all()->lists('name','id'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
                <div class='col-sm-4' id="via_reason">
                    Type of differentiation<br> {{ Form::select('differentiation',array("Highly differentiated"=>"Highly differentiated","Moderately differentiated"=>"Moderately differentiated","Low differentiation"=>"Low differentiation"),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>

            </div>
            <div class='form-group'>

                <div class='col-sm-6'>
                    <span id="histology">what is the histology results<br>{{ Form::select('histology',HistologyResult::all()->lists('name','id'),'',array('class'=>'form-control')) }}</span>
                </div>
                <div class='col-sm-6'>
                     <span id="cancer">which type of cancer?<br>{{ Form::select('cancer',CancerType::all()->lists('name','id'),'',array('class'=>'form-control')) }}</span>
                </div>

            </div>

        </div>
        <script>
            $(document).ready(function (){
                var histology = $("#histology").html()
                var cancer = $("#cancer").html()
                $("#histology,#cancer").html("");
                $("select[name=colpo_result]").change(function(){
                    if($(this).val() == "5"){
                        $("#histology").html(histology);

                        $("select[name=histology]").change(function(){
                            if($(this).val() == "5"){
                                $("#cancer").html(cancer);
                            }else{
                                $("#cancer").html("");
                            }
                        });
                        $("#cancer").html("");
                    }else{
                        $("#histology").html("");
                        $("#cancer").html("");

                    }
                })
            });
        </script>



    </div>
</div>
