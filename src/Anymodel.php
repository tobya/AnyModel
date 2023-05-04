<?php


namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;


class Anymodel extends Model
{

    public $timestamps = false;


    public static function table($tablename, $options = []){

        // Create a new Model  and set its table
        $Model = new Anymodel();
        $Model->table = $tablename;

        // Set any further options passed in before returning
        Collect($options)->each(function($value, $name) use ($Model){
            $Model->{$name} = $value;
        });

        return $Model;
    }
    public function getIDattribute(){
        // due to various contortions Model->id will not always be available and it is not possible to set
        // primaryKey and have it work so if it is requested and does not exist rather than returning '' (default behaviour)
        // raise an error.
        if (!isset($this->{$this->primaryKey})){
            throw new \Exception('Anymodel::id does not have a value.  Please specify actual id field name');
        }

    }

}
