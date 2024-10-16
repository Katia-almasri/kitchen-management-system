<?php

namespace App\Models;

use App\Models\basic\Base;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kitchen extends Base
{
    use HasFactory;
    // table name
    protected $table = 'kitchen';
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'restaurant_id'
    ];

    #################### RELATIONS ############################
    // restaurant relationship
    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    // users relationship
    public function users()
    {
        return $this->hasMany(User::class, 'kitchen_id');
    }

    // location relationship
    public function locations()
    {
        return $this->hasMany(User::class, 'kitchen_id');
    }
}
