<?php

  namespace Tobya\Anymodel\Concerns;

  trait HasNoTable
  {
    /**
     *
     * @param $options
     * @return bool
     * @throws \Exception
     */
    public function Save($options = []){
        throw new \Exception('Save() method Not implemented on this model as it is not connected to a table. ');
    }
  }
