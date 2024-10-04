<?php


namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;


class AnyModel extends Model
{

    public $timestamps = false;
    protected $guarded = [];

  /**
   * Set the tablename that the model will be loaded from.
   * @param string $tablename
   * @param array $options
   * @return AnyModel
   */
    public static function table($tablename, $options = []){

        // Create a new Model  and set its table
        $Model = new AnyModel();
        $Model->table = $tablename;

        // Set any further options passed in before returning
        // since AnyModel extends Model protected properties
        // on Model can be set here.
        Collect($options)->each(function($value, $name) use ($Model){
            $Model->{$name} = $value;
        });

        return $Model;
    }

  /**
   * If used on table without id field, Model->id will not be available. If it is not set via
   * primaryKey and have it work so if it is requested and does not exist rather than
   * returning '' (default behaviour) raise an error.
   * @return mixed
   * @throws \Exception
   */
    public function getIDattribute(){

        // due to various contortions Model->id will not always be available. If it is not set via
        // primaryKey and have it work so if it is requested and does not exist, rather than
        // returning '' (default behaviour), raise an error.
        if (!isset($this->attributes[$this->primaryKey])){
            throw new \Exception('AnyModel::id does not have a value.  Please specify actual id field name');
        }

        // return primary key value.
        return $this->attributes[$this->primaryKey];

    }

}
