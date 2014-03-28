<div class="col-md-12" style="padding-left: 5px;padding-right: 0px">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class='form-group'>

                <div class='col-sm-4'>
                    HIV Status known (One Last Year)<br>{{ Form::select('hiv_status',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
                <div class='col-sm-4'>
                    <span id="ptic_stat">PITC Offered<br> {{ Form::select('ptic_stat',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}</span>
                </div>
                <div class='col-sm-4'>
                    <span id="ptic_agree">PITC Agreed<br> {{ Form::select('ptic_agree',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}</span>
                </div>
            </div>

            <div class='form-group' id="positive">
                <div class='col-sm-4'>
                    current test results<br>{{ Form::select('current_test_result',array('Negative'=>'Negative','Positive'=>'Positive'),'',array('class'=>'form-control')) }}
                </div>
                <div class='col-sm-4'>
                    <span id="art_stat">Is the client on ART? <br> {{ Form::select('art_status',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}</span>
                </div>
                <div class='col-sm-4'>
                    <span id="cd4_stat">current CD4 (cells/mm3) <br> {{ Form::select('cd4_stat',array_combine(range(0,1500), range(0,1500)),'500',array('class'=>'form-control')) }}</span>
                </div>
            </div>

        </div>
        <script>
            $(document).ready(function (){

                var ptic_stat = $("#ptic_stat").html();
                var ptic_agree = $("#ptic_agree").html();
                var positive = $("#positive").html();
                var art_stat = $("#art_stat").html();
                var cd4_stat = $("#cd4_stat").html();
                $("#ptic_agree,#positive").html("");
                $("select[name=ptic_stat]").change(function(){
                    if($(this).val() == "yes"){
                        $("#ptic_agree").html(ptic_agree);
                        $("select[name=ptic_agree]").change(function(){
                            if($(this).val() == "yes"){
                                $("#positive").html(positive)
                                $("#art_stat,#cd4_stat").html("");
                                $("select[name=current_test_result]").change(function(){
                                    if($(this).val() == "Positive"){
                                        $("#art_stat").html(art_stat);
                                        $("#cd4_stat").html(cd4_stat);
                                    }else{
                                        $("#art_stat,#cd4_stat").html("");
                                    }
                                });
                            }else{
                                $("#positive").html("");
                            }
                        });
                    }else{
                        $("#ptic_agree,#positive").html("");

                    }
                })
            });
        </script>



    </div>
</div>
