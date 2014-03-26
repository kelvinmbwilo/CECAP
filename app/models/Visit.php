<?php
/**
 * Created by PhpStorm.
 * User: kelvin
 * Date: 2/17/14
 * Time: 9:04 PM
 */
class Visit extends Eloquent {

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'visit';

    protected  $guarded = array('id');

    public function patient(){
        return $this->belongsTo('Patient', 'patient_id', 'id');
    }

    public function via(){
        return $this->hasMany('ViaStatus', 'visit_id', 'id');
    }

    public function papsmear(){
        return $this->hasMany('PapsmearStatus', 'visit_id', 'id');
    }

    public function hiv(){
        return $this->hasMany('HivStatus', 'visit_id', 'id');
    }


    public function intervention(){
        return $this->hasMany('Intervention', 'visit_id', 'id');
    }

    public function gynecology(){
        return $this->hasMany("GynecologicalHistory","visit_id","id");
    }

    public function contraceptive(){
        return $this->hasMany("ContraceptiveHistory","visit_id","id");
    }

}