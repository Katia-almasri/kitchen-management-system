<?php

namespace App\Models\locations;

use App\Models\basic\Base;
use App\Models\Kitchen;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Base
{
    use HasFactory;

    // table name
    protected $table = 'location';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'status',
        'qr_code',
        'count',
        'kitchen_id'

    ];

    #################### RELATIONS ############################
    public function kitchen()
    {
        return $this->belongsTo(Kitchen::class);
    }

    public function subLocations()
    {
        return $this->hasMany(SubLocation::class, 'location_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'location_id');
    }
}
