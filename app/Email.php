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

    /**
     * Get the tags for this email
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tags( ){
        return $this->belongsToMany('Incremently\Tag')->withTimestamps();
    }

    /**
     * Get a list of tag id's associated with the current email
     *
     * @return mixed
     */
    public function getTagListAttribute( ){
        return $this->tags->lists('id');
    }
}
