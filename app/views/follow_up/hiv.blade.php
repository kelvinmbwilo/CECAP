<div class="col-md-12" style="padding-left: 5px;padding-right: 0px">
    <div class="panel panel-default">
        <div class="panel-body">

            <div class='form-group'>

                <div class='col-sm-4'>
                    HIV Status known (One Last Year)<br>{{ Form::select('hiv_status',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
                <div class='col-sm-4'>
                    <span id="last_test">PITC Offered<br> {{ Form::select('last_test',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}</span>
                </div>
                <div class='col-sm-4'>
                    <span id="hivstat">PITC Agreed<br> {{ Form::select('past_hiv_result',array('Negative'=>'Negative','Positive'=>'Positive'),'',array('class'=>'form-control')) }}</span>
                </div>
            </div>

            <div class='form-group' id="positive">
                <div class='col-sm-4'>
                    current test results<br>{{ Form::select('current_test_result',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}
                </div>
                <div class='col-sm-4'>
                    Is the client on ART? <br> {{ Form::select('art_status',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control','required'=>'requiered')) }}
                </div>
                <div class='col-sm-4'>
                    What is the latest CD4 count(cells/mm3) (within last 6 months) <br> {{ Form::select('prev_cd4',array_combine(range(0,1500), range(0,1500)),'500',array('class'=>'form-control')) }}
                </div>
            </div>

            <div class='form-group' id="negative">

                <div class='col-sm-4'>
                    would you test again<br>{{ Form::select('test_again',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}
                </div>
                <div class='col-sm-4'>
                    current test results<br>{{ Form::select('current_test_result',array('no'=>'No','yes'=>'Yes'),'',array('class'=>'form-control')) }}
                </div>
                <div class='col-sm-4'>
                    current CD4 (cells/mm3)<br>{{ Form::select('current_cd4',array_combine(range(0,1500), range(0,1500)),'500',array('class'=>'form-control')) }}
                </div>

            </div>
        </div>
        <script>
            $(document).ready(function (){

                var last_test = $("#last_test").html();
                var hivstat = $("#hivstat").html();
                var positive = $("#positive").html();
                var negative = $("#negative").html();
                $("#last_test,#hivstat,#positive,#negative").html("");
                $("select[name=hiv_status]").change(function(){
                    if($(this).val() == "yes"){
                        $("#last_test,#hivstat").show("slow");
                        $("#last_test").html(last_test);
                        $("#hivstat").html(hivstat);
                        $("#negative").html(negative)
                        $("select[name=past_hiv_result]").change(function(){
                            if($(this).val() == "Positive"){
                                $("#positive").html(positive)
                                $("#negative").html("")
                            }else{
                                $("#negative").html(negative)
                                $("#positive").html("")
                            }
                        });
                    }else{
                        $("#last_test,#hivstat,#positive,#negative").html("");

                    }
                })
            });
        </script>



    </div>
</div>
