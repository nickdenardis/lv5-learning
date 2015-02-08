<?php namespace Incremently;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

	//
    protected $fillable = [
        'title',
        'body',
    ];

    /**
     * An email belongs to a user
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user( ){
        return $this->belongsTo('Incremently\User');
    }
}
