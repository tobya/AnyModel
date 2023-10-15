<?php

namespace Tobya\Anymodel;

use Illuminate\Database\Eloquent\Model;
use Tobya\Anymodel\Concerns\HasNoTable;


class NoModel extends Model
{
    use HasNoTable;
    public $timestamps = false;
    protected $guarded = [];


}
