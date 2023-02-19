<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Todo extends Model
{
    use Sortable;   // 追加
    public $sortable = ['id', 'created_at', 'updated_at'];
}
