<?php

namespace App\Http\Models\Entities;
use Illuminate\Notifications\Notifiable;
// use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    use Notifiable;
    protected $table      = 'customers';
    protected $primaryKey = 'id';
    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
        'updated_at' => 'datetime:Y-m-d',
        'deleted_at' => 'datetime:Y-m-d',
    ];
    protected $fillable   = [
        'id',
        'name',
        'lastname',
        'subdomain',
        'user_id',
        'currency_id',
        'active',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function user()
    {
        return $this->belongsTo('App\Http\Models\Entities\User');
    }
    public function currency()
    {
        return $this->belongsTo('App\Http\Models\Entities\Currency');
    }
    public function account()
    {
        return $this->hasOne('App\Http\Models\Entities\Account');
    }

}
