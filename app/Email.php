<?php namespace Incremently;

use Illuminate\Database\Eloquent\Model;

class Email extends Model {

	//
    protected $fillable = [
        'title',
        'body',
        'template_id',
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
     * An email belongs to a template
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function template(){
        return $this->belongsTo('Incremently\Template');
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
