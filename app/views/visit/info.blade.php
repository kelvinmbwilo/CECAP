<?php
$first_visit = $patient->visit()->first();
?>
<ul class="list-group">

<!--    patients basic information-->
    <li class="list-group-item">
        <h4>Patient Basic Info</h4>
        <div class="row">
            <div class="col-sm-5">Name :{{ $patient->first_name }} {{ $patient->middle_name }} {{ $patient->last_name }}</div>
            <div class="col-sm-3">Age : {{ date('Y')-date('Y',strtotime($patient->birth_date)) }}Yrs </div>
            <div class="col-sm-4">Hosptal ID : {{ $patient->hospital_id }}</div>
        </div>
        <div class="row">
            <div class="col-sm-3">Region : {{ $visit->info->regions->region }}</div>
            <div class="col-sm-3">District : {{ $visit->info->districts->district }} </div>
            <div class="col-sm-3">Ward : {{ $visit->info->ward }} </div>
            <div class="col-sm-3">Name Of Ten Cell Leader : {{ $visit->info->ten_cell_leader }}</div>
        </div>
    </li>

<!--    gynecological history-->
    <li class="list-group-item">
        <h4>Gynecological History</h4>
        <div class="row">
            <div class="col-sm-3">Parity :{{ $visit->gynecology->parity }}</div>
            <div class="col-sm-3">Total Number Of Pregnancy : {{ $visit->gynecology->number_of_pregnancy }} </div>
            <div class="col-sm-3">Age At Sexual Debut : {{ $visit->gynecology->age_at_sexual_debut }}</div>
            <div class="col-sm-3">Age at Menarche : {{ $visit->gynecology->menarche }}</div>
        </div>
        <div class="row">
            <div class="col-sm-3">Marital Status : {{ $visit->gynecology->marital_status }}</div>
            <div class="col-sm-3">Age At First Marriage : {{ $visit->gynecology->age_at_first_marriage }} </div>
            <div class="col-sm-3">Sexual Partners: {{ $visit->gynecology->sexual_partner }} </div>
            <div class="col-sm-3">Partners Sexual Partners : {{ $visit->gynecology->partner_sexual_partner }}</div>
        </div>
    </li>

    <!--    Contraceptive history-->
    <li class="list-group-item">
        <h4>Contraceptive History</h4>
        <div class="row">
            <div class="col-sm-6">
                @if($first_visit->contraceptive->previous_status == 'yes' )
                    This Patient Has History of Using Contraceptive Of Type :{{ $patient->visit()->orderBy('id','ASC')->first()->contraceptive->previous->name }}
                @else
                    This Patient Has No History of Using Contraceptive Before This Visit
                @endif
            </div>
            <div class="col-sm-6">
                @if($visit->contraceptive->current_status == 'yes' )
                    At Time of Visit Patient Was Currently Using Contraceptive Of Type :{{ $visit->contraceptive->current->name }}
                @else
                At Time of Visit This Patient Is Not Currently Using  Contraceptives
                @endif
            </div>
        </div>
    </li>


<!--    HIV-->

    <li class="list-group-item">
        <h4>HIV</h4>

        @if($first_visit->id == $visit->id)
            <div class="row">
                <div class="col-sm-4">
                    @if($visit->hiv->status == 'yes')
                        HIV Status is Known
                    @else
                        HIV Status Was Not Known
                    @endif
                </div>
                <div class="col-sm-4">
                    @if($visit->hiv->status == 'yes')
                    Last Test Was Done In : {{ $visit->hiv->last_test }}
                    @else

                    @endif
                </div>
                <div class="col-sm-4">
                    @if($visit->hiv->status == 'yes')
                    HIV Status : {{ $visit->hiv->result }}
                    @else

                    @endif
                </div>
            </div>
            @if($visit->hiv->result == 'Positive')
                <div class="row">
                    <div class="col-sm-4">
                        Years Since Diagnosis : {{ $visit->hiv->year_of_first_diagnosis }}
                    </div>
                    <div class="col-sm-4">
                        @if($visit->hiv->art_status == 'yes' )
                        Patient  Using ART
                        @else
                        Patient Not Using ART
                        @endif
                    </div>
                    <div class="col-sm-4">
                        CD4 Count: {{ $visit->hiv->prev_cd4_count }}

                    </div>
                </div>
            @else
                <div class="row">
                    <div class="col-sm-4">
                        @if($visit->hiv->pitc_agreed == 'yes' )
                            HIV Test Was Conducted Again
                        @else

                        @endif
                    </div>
                    <div class="col-sm-4">
                        @if($visit->hiv->pitc_agreed == 'yes' )
                        Test Result : {{ $visit->hiv->pitc_result }}
                        @else

                        @endif
                    </div>
                    <div class="col-sm-4">
                        @if($visit->hiv->pitc_result == 'Positive' )
                        CD4 Count : {{ $visit->hiv->pitc_cd4_count }}
                        @else

                        @endif
                    </div>
                </div>
            @endif

<!--        second visit and later visits-->
        @else
            <div class="row">
                <div class="col-sm-4">
                    @if($visit->hiv->status == 'yes')
                    HIV Status is Known
                    @else
                    HIV Status Was Not Known
                    @endif
                </div>
                <div class="col-sm-4">
                    @if($visit->hiv->pitc_offered == 'yes')
                        PITC Was Offered &nbsp;&nbsp;&nbsp;
                        @if($visit->hiv->pitc_agreed == 'yes')
                            And Agreed
                        @else
                            But Declined By Patient
                        @endif
                    @else
                        PITC Was Not Offered
                    @endif
                </div>
                <div class="col-sm-4">
                    @if($visit->hiv->pitc_offered == 'yes')
                        PITC Result {{ $visit->hiv->pitc_result }}
                    @else

                    @endif
                </div>
            </div>
            @if($visit->hiv->pitc_result == 'Positive')
            <div class="row">
                <div class="col-sm-6">
                    @if($visit->hiv->art_status == 'yes' )
                    Patient  Using ART
                    @else
                    Patient Not Using ART
                    @endif
                </div>
                <div class="col-sm-6">
                    CD4 Count: {{ $visit->hiv->prev_cd4_count }}
                </div>
            </div>
            @else

            @endif

        @endif

    </li>
<!--    Via counceling-->
    <li class="list-group-item">
        <h4>VIA Counseling</h4>
        <div class="row">
            <div class="col-sm-4">
                @if($visit->via->via_councelling_status == 'yes' )
                    VIA Counseling Was Offered During The Visit
                @else
                    VIA Counseling Was Not Offered During The Visit
                @endif
            </div>
            <div class="col-sm-4">
                @if($visit->via->via_test_status == 'yes' )
                    VIA Test Was Done
                @else
                    VIA Test Was Not Done
                @endif
            </div>
            <div class="col-sm-4">
                @if($visit->via->via_test_status == 'yes' )
                    VIA Test Result : {{ $visit->via->via_result }}
                @else
                    Reason : {{ $visit->via->reject_reason }}
                @endif
            </div>

        </div>
    </li>

<!--    colposcopy-->
    <li class="list-group-item">
        <h4>Colposcopy</h4>
        <div class="row">
            <div class="col-sm-6">
                @if($visit->colposcopy->status == 'yes' )
                Colposcopy Was Done During The Visit
                @else
                Colposcopy Was Not Done During The Visit
                @endif
            </div>
            <div class="col-sm-6">
                @if($visit->colposcopy->status == 'yes' )
                Colposcopy Findings : {{ $visit->colposcopy->result->name }}
                @else

                @endif
            </div>

        </div>
    </li>

<!--    papsmear-->
    <li class="list-group-item">
        <h4>Pap Smear</h4>
        <div class="row">
            <div class="col-sm-6">
                @if($visit->papsmea->status == 'yes' )
                Pap Smear Was Done During The Visit
                @else
                Pap Smear Was Not Done During The Visit
                @endif
            </div>
            <div class="col-sm-6">
                @if($visit->papsmea->status == 'yes' )
                Pap Smear Result : {{ $visit->papsmea->result->name }}
                @else

                @endif
            </div>

        </div>
    </li>

<!--    intervention-->
    <li class="list-group-item">
        <h4>Intervention</h4>
        <div class="row">
            <div class="col-sm-5">
                Intervention Done : {{ $visit->intervention->result->name }}
            </div>
            <div class="col-sm-3">
                Specific Indication : {{ $visit->intervention->indicator->name }}
            </div>
            <div class="col-sm-4">
                Type Of Differentiation : {{ $visit->intervention->differentiation }}
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
                @if($visit->intervention->histology_id != 0)
                    Histology Result: {{ $visit->intervention->histology->name }}
                @endif
            </div>
            <div class="col-sm-3">
                @if($visit->intervention->cancer_id != 0)
                    Cancer : {{ $visit->intervention->cancer->name }}
                @endif
            </div>
        </div>
    </li>
</ul>