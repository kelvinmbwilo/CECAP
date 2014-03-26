@extends("layout.master")
@section('breadcumbs')
<li>
    <a href="{{ url('home') }}">Dashboard</a>
</li>
<li>
    <a href="{{ url('patients') }}">patients</a>
</li>
<li class="active">Registration</li>
@stop



{{ Form::open(array("url"=>url('patient/add'),"class"=>"form-horizontal","id"=>'FileUploader')) }}
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
    <h3>HIV</h3>
    <div class="col-md-12" style="padding-left: 5px;padding-right: 0px">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class='form-group'>

                    <div class='col-sm-4'>
                        HIV Status known<br><select class="form-control" required="requiered" name="hiv_status"><option value="no">No</option><option value="yes">Yes</option></select>                </div>
                    <div class='col-sm-4'>
                        <span id="last_test">Last Test Done In(year)<br> <select class="form-control" required="requiered" name="last_test"><option value="2014">2014</option><option value="2013">2013</option><option value="2012">2012</option><option value="2011">2011</option><option value="2010">2010</option><option value="2009">2009</option><option value="2008">2008</option><option value="2007">2007</option><option value="2006">2006</option><option value="2005">2005</option><option value="2004">2004</option><option value="2003">2003</option><option value="2002">2002</option><option value="2001">2001</option><option value="2000">2000</option><option value="1999">1999</option><option value="1998">1998</option><option value="1997">1997</option><option value="1996">1996</option><option value="1995">1995</option><option value="1994">1994</option><option value="1993">1993</option><option value="1992">1992</option><option value="1991">1991</option><option value="1990">1990</option><option value="1989">1989</option><option value="1988">1988</option><option value="1987">1987</option><option value="1986">1986</option><option value="1985">1985</option><option value="1984">1984</option><option value="1983">1983</option><option value="1982">1982</option><option value="1981">1981</option><option value="1980">1980</option><option value="1979">1979</option><option value="1978">1978</option><option value="1977">1977</option><option value="1976">1976</option><option value="1975">1975</option><option value="1974">1974</option><option value="1973">1973</option><option value="1972">1972</option><option value="1971">1971</option><option value="1970">1970</option></select></span>
                    </div>
                    <div class='col-sm-4'>
                        <span id="hivstat">HIV Status<br> <select class="form-control" required="requiered" name="past_hiv_result"><option value="Negative">Negative</option><option value="Positive">Positive</option></select></span>
                    </div>
                </div>

                <div class='form-group' id="positive">
                    <div class='col-sm-4'>
                        how many years since the diagnosis <br> <select class="form-control" required="requiered" name="year_since_diagnosis"><option value="0">0</option><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option><option value="11">11</option><option value="12">12</option><option value="13">13</option><option value="14">14</option><option value="15">15</option><option value="16">16</option><option value="17">17</option><option value="18">18</option><option value="19">19</option><option value="20">20</option><option value="21">21</option><option value="22">22</option><option value="23">23</option><option value="24">24</option><option value="25">25</option><option value="26">26</option><option value="27">27</option><option value="28">28</option><option value="29">29</option><option value="30">30</option><option value="31">31</option><option value="32">32</option><option value="33">33</option><option value="34">34</option><option value="35">35</option><option value="36">36</option><option value="37">37</option><option value="38">38</option><option value="39">39</option><option value="40">40</option><option value="41">41</option><option value="42">42</option><option value="43">43</option><option value="44">44</option><option value="45">45</option><option value="46">46</option><option value="47">47</option><option value="48">48</option><option value="49">49</option><option value="50">50</option><option value="51">51</option><option value="52">52</option><option value="53">53</option><option value="54">54</option><option value="55">55</option><option value="56">56</option><option value="57">57</option><option value="58">58</option><option value="59">59</option><option value="60">60</option><option value="61">61</option><option value="62">62</option><option value="63">63</option><option value="64">64</option><option value="65">65</option><option value="66">66</option><option value="67">67</option><option value="68">68</option><option value="69">69</option><option value="70">70</option><option value="71">71</option><option value="72">72</option><option value="73">73</option><option value="74">74</option><option value="75">75</option><option value="76">76</option><option value="77">77</option><option value="78">78</option><option value="79">79</option><option value="80">80</option><option value="81">81</option><option value="82">82</option><option value="83">83</option><option value="84">84</option><option value="85">85</option><option value="86">86</option><option value="87">87</option><option value="88">88</option><option value="89">89</option><option value="90">90</option></select>                </div>
                    <div class='col-sm-4'>
                        Is the client on ART? <br> <select class="form-control" required="requiered" name="art_status"><option value="no">No</option><option value="yes">Yes</option></select>                </div>
                    <div class='col-sm-4'>
                        What is the latest CD4 count(cells/mm3) (within last 6 months) <br> <input class="form-control" placeholder="CD4 Count" required="required" id="Birth_Date" name="prev_cde" type="text" value="">                </div>
                </div>

                <div class='form-group' id="negative">

                    <div class='col-sm-4'>
                        would you test again<br><select class="form-control" required="requiered" name="test_again"><option value="no">No</option><option value="yes">Yes</option></select>                </div>
                    <div class='col-sm-4'>
                        current test results<br><select class="form-control" required="requiered" name="current_test_result"><option value="no">No</option><option value="yes">Yes</option></select>                </div>
                    <div class='col-sm-4'>
                        current CD4 (cells/mm3)<br><input class="form-control" placeholder="CD4 Count" required="required" id="Birth_Date" name="current_cd4" type="text" value="">                </div>

                </div>
            </div>
            <script>
                $(document).ready(function (){
                    $("#last_test,#hivstat,#positive,#negative").hide();
                    $("select[name=hiv_status]").change(function(){
                        if($(this).val() == "yes"){
                            $("#last_test,#hivstat").show("slow");
                            $("#negative").show("slow")
                            $("select[name=past_hiv_result]").change(function(){
                                if($(this).val() == "Positive"){
                                    $("#positive").show("slow")
                                    $("#negative").hide("slow")
                                }else{
                                    $("#negative").show("slow")
                                    $("#positive").hide("slow")
                                }
                            });
                        }else{
                            $("#last_test,#hivstat,#positive,#negative").hide("slow");

                        }
                    })
                });
            </script>



        </div>
    </div>
</div>

<div class="row">
    <h3>VIA</h3>
    <div class="col-md-12" style="padding-left: 5px;padding-right: 0px">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class='form-group'>

                    <div class='col-sm-4'>
                        VIA Counselling done?<br><select class="form-control" required="requiered" name="via_counceling"><option value="no">No</option><option value="yes">Yes</option></select>                </div>
                    <div class='col-sm-4'>
                        VIA test done<br><select class="form-control" required="requiered" name="via_test"><option value="no">No</option><option value="yes">Yes</option></select>                </div>
                    <div class='col-sm-4' id="via_reason">
                        why (List reasons)<br> <select class="form-control" required="requiered" name="via_reason"><option value="SCJ not seen">SCJ not seen</option><option value="Heavy menses">Heavy menses</option><option value="Suspicious of cancer">Suspicious of cancer</option><option value="Massive endocervical discharge (cervicitis)">Massive endocervical discharge (cervicitis)</option><option value="pregnancy">pregnancy</option></select>                </div>
                    <div class='col-sm-4' id="viaresult">
                        what is the test results<br> <select class="form-control" required="requiered" name="via_results"><option value="Normal cervix (Negative)">Normal cervix (Negative)</option><option value="Abnormal cervix (Positive)">Abnormal cervix (Positive)</option></select>                </div>
                </div>

            </div>
            <script>
                $(document).ready(function (){
                    $("#viaresult").hide();
                    $("select[name=via_test]").change(function(){
                        if($(this).val() == "yes"){
                            $("#viaresult").show("slow");
                            $("#via_reason").hide("slow");
                        }else{
                            $("#viaresult").hide("slow");
                            $("#via_reason").show("slow");

                        }
                    })
                });
            </script>



        </div>
    </div>

</div>

<div class="row">
    <div class="col-md-6" style="padding-left: 0px;padding-right: 5px">
        <h3 class="">Colposcopy</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class='form-group'>
                    <div class='col-sm-6'>
                        Colposcopy done<br><select class="form-control" required="requiered" name="colposcopy_status"><option value="no">No</option><option value="yes">Yes</option></select>    </div>
                    <div class='col-sm-6'>
                        <span id="colpores">Findings<br><select class="form-control" required="requiered" name="colpo_result"><option value="1">Normal cervix</option><option value="2">Squoous metaplasia</option><option value="3">LGL</option><option value="4">HGL</option><option value="5">Suspicious of cancer</option></select></span>
                    </div>
                </div>


                <script>
                    $(document).ready(function (){
                        $("#colpores").hide()
                        $("select[name=colposcopy_status]").change(function(){
                            if($(this).val() == "yes"){
                                $("#colpores").show("slow")
                            }else{
                                $("#colpores").hide("slow")
                            }
                        })
                    });
                </script>


            </div>
        </div>

    </div>
    <div class="col-md-6" style="padding-left: 5px;padding-right: 0px">
        <h3 class="">Pap Smear</h3>
        <div class="panel panel-default">
            <div class="panel-body">
                <div class='form-group'>
                    <div class='col-sm-6'>
                        Pap smea done?<br><select class="form-control" required="requiered" name="pap_status"><option value="no">No</option><option value="yes">Yes</option></select>    </div>
                    <div class='col-sm-6'>
                        <span id="papsmeares">what was the results<br><select class="form-control" required="requiered" name="pap_result"><option value="1">Normal</option><option value="2">Inflammation (cervicitis)</option><option value="3">LGL</option><option value="4">HGL</option><option value="5">Ca-insitu</option><option value="6">Carcinoma</option></select></span>
                    </div>
                </div>


                <script>
                    $(document).ready(function (){
                        $("#papsmeares").hide()
                        $("select[name=pap_status]").change(function(){
                            if($(this).val() == "yes"){
                                $("#papsmeares").show("slow")
                            }else{
                                $("#papsmeares").hide("slow")
                            }
                        })
                    });
                </script>


            </div>
        </div>

    </div>

</div>

<div class="row">
    <h3>Intervention</h3>
    <div class="col-md-12" style="padding-left: 5px;padding-right: 0px">
        <div class="panel panel-default">
            <div class="panel-body">

                <div class='form-group'>

                    <div class='col-sm-4'>
                        Intervention done<br><select class="form-control" required="requiered" name="colpo_result"><option value="1">Follow up test after six months</option><option value="2">Follow up test after one year</option><option value="3">Follow up test after three years</option><option value="4">Cryotherapy</option><option value="5">LEEP</option><option value="6">Conization</option><option value="7">Simple Hysterectomy</option><option value="8">Radical Hysterectomy</option><option value="9">Referral to cancer institute</option></select>                </div>
                    <div class='col-sm-4'>
                        Specific indication <br><select class="form-control" required="requiered" name="colpo_result"><option value="1">large lesion</option><option value="2">Large lesion beyond 2mm of Cryoprobe</option><option value="3">Lesion can not be seen to its entirely</option><option value="4">Endocervical lesion</option><option value="5">Advanced HIV</option><option value="6">Patient not reliable for follow up</option><option value="7">Advanced Age</option><option value="8">Ca-insitu</option></select>                </div>
                    <div class='col-sm-4' id="via_reason">
                        Type of differentiation<br> <select class="form-control" required="requiered" name="differentiation"><option value="Highly differentiated">Highly differentiated</option><option value="Moderately differentiated">Moderately differentiated</option><option value="Low differentiation">Low differentiation</option></select>                </div>

                </div>
                <div class='form-group'>

                    <div class='col-sm-6'>
                        <span id="histology">what is the histology results<br><select class="form-control" required="requiered" name="histology"><option value="1">CIN 1</option><option value="2">CIN II</option><option value="3">CIN III</option><option value="4">Ca insitu</option><option value="5">Cancer</option></select></span>
                    </div>
                    <div class='col-sm-6'>
                        <span id="cancer">which type of cancer?<br><select class="form-control" required="requiered" name="cancer"><option value="1">Squamous</option><option value="2">adenosquamous</option><option value="3">Adenocarcinoma</option></select></span>
                    </div>

                </div>

            </div>
            <script>
                $(document).ready(function (){
                    $("#histology,#cancer").hide();
                    $("select[name=colpo_result]").change(function(){
                        if($(this).val() == "5"){
                            $("#histology").show("slow");

                            $("select[name=histology]").change(function(){
                                if($(this).val() == "5"){
                                    $("#histology").show("slow");

                                    $("#cancer").show("slow");
                                }else{
                                    $("#cancer").hide("slow");
                                }
                            });
                            $("#cancer").hide("slow");
                        }else{
                            $("#histology").hide("slow");
                            $("#cancer").hide("slow");

                        }
                    })
                });
            </script>



        </div>
    </div>

</div>
<div id="output"></div>
<div class='col-sm-12 form-group text-center'>
    {{ Form::submit('Add User',array('class'=>'btn btn-primary','id'=>'submitqn')) }}
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
            $('#FileUploader').resetForm();
            setTimeout(function() {
                $("#output").html("");
            }, 3000);
            $("#listuser").load("http://localhost/cancer/public/index.php/user/list/fgdf")
        }
    });
</script>
@stop