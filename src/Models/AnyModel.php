<?php


namespace Tobya\Anymodel\Models;

use Illuminate\Database\Eloquent\Model;

class AnyModel extends Model
{

    // use correct dateformat for MSSQL
    protected $dateFormat = 'Ymd H:i:s';
    public $timestamps = false;


    public static function FromTable($tablename){
        $anyTable = new AnyTable();
        $anyTable->table = $tablename;
        $anyTable->primaryKey = $idname;
        return $anyTable;
    }
    
    public function setTableName($tablename){
        $this->table = $tablename;
    }
    
    public function setDateFormat($dateforma)
}