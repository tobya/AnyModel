<?php


namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;


class AnyModel extends Model
{

    public $timestamps = false;
    protected $guarded = [];

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
    public function getIDattribute(){

        // due to various contortions Model->id will not always be available. If it is not set via
        // primaryKey and have it work so if it is requested and does not exist rather than returning '' (default behaviour)
        // raise an error.
        if (!isset($this->attributes[$this->primaryKey])){
            throw new \Exception('AnyModel::id does not have a value.  Please specify actual id field name');
        }
        return $this->attributes[$this->primaryKey];

    }

}
