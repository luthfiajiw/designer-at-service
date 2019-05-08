<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\UuidAndCodeGenerator;

class Design extends Model
{
    use UuidAndCodeGenerator;

    protected $guarded = [
    	'id', 'uuid', 'created_at', 'updated_at'
    ];

    protected $with = [
        'designer', 'client', 'lecture'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    public function designer()
    {
    	return $this->belongsTo(Designer::class)->withDefault([
    		'name' => 'None.'
    	]);
    }

    public function client()
    {
        return $this->hasOne(Client::class);
    }

    public function lecture()
    {
        return $this->hasOne(Lecture::class);
    }

}
