<?php namespace Incremently;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

	//
    protected $fillable = [
        'title',
        'body',
    ];
}
