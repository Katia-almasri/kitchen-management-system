<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReturnProcess extends Model
{
    use HasFactory;
    protected $table = 'return_process';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'product_id',
        'reason'
    ];

    #################### RELATIONS ############################
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
