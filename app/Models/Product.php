<?php

namespace App\Models;

use App\Models\basic\Base;
use App\Models\locations\Location;
use App\Models\locations\SubLocation;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Base
{
    use HasFactory;
    // table name
    protected $table = 'product';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ingredients',
        'production_date',
        'expiry_date',
        'location_id',
        'sub_location_id',
        'quantity',
        'alert_quantity',
        'qr_code',
        'status'
    ];

    #################### RELATIONS ############################
    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function subLocation()
    {
        return $this->belongsTo(SubLocation::class);
    }

    public function returnProcesses()
    {
        return $this->hasMany(ReturnProcess::class, 'product_id');
    }
}
