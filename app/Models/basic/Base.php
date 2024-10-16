<?php

namespace App\Models\basic;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Base extends Model
{
    use HasFactory;

    public function getTable()
    {
        if (!isset($this->table)) {
            return str_replace(
                '\\',
                '',
                Str::snake(Str::singular(class_basename($this)))
            );
        }
        return $this->table;
    }
}
