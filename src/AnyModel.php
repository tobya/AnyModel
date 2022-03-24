<?php


namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;


class AnyModel extends Model
{
    
    public $timestamps = false;

    public static function table($tablename, $idfield = null, $options = []){
        
        // Create a new Model  and set its table and primary key.
        $Model = new AnyModel();
        $Model->table = $tablename;        
        $Model->primaryKey = $idfield;
        
        // Set any further options passed in before returning         
        Collect($options)->each(function($value, $name){
            $this->{$name} = $value;
        });        
        
        return $Model;
    }
    
}