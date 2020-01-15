<?php

namespace ElephantsGroup\ToDo;

use Closure;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $table = 'task';
    public $timestamps = false;

    public function done() : void
    {
        $this->done = true;
    }

    public function undone() : void
    {
        $this->done = false;
    }
}
