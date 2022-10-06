<?php


namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;


class AnyModel extends Model
{

    public $timestamps = false;
    protected $primaryKey; // increase visibility of primaryKey to allow it to be set in options


    public static function table($tablename, $options = []){

        // Create a new Model  and set its table
        $Model = new AnyModel();
        $Model->table = $tablename;

        // Set any further options passed in before returning
        Collect($options)->each(function($value, $name) use ($Model){
            $Model->{$name} = $value;
        });

        return $Model;
    }


}
