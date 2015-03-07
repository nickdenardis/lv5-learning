<?php namespace Incremently;

use Illuminate\Database\Eloquent\Model;

class Template extends Model {

    protected $casts = [
        'is_active' => 'boolean',
    ];

	//
    protected $fillable = [
        'name',
        'body',
        'is_active',
     ];
}
