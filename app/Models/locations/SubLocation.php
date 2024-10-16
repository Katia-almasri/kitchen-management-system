<?php

namespace App\Models\locations;

use App\Models\basic\Base;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubLocation extends Base
{
    use HasFactory;

    // table name
    protected $table = 'sub_location';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'location_id'
    ];

    #################### RELATIONS ############################
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'sub_location_id');
    }
}
