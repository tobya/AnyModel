<?php


namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;


class AnyModel extends Model
{
    
    public $timestamps = false;

    public static function table($tablename, $idfield = null, $options = []){
        
        // Set any options passed in before creating         
        Collect($options)->each(function($value, $name){
            $this->{$name} = $value;
        });
        
        // Create a new Model and set its table and primary key.
        $anyTable = new AnyTable();
        $anyTable->table = $tablename;        
        $anyTable->primaryKey = $idfield;
        return $anyTable;
    }
    
}