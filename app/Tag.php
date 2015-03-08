<?php namespace Incremently;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model {

    protected $fillable = [
        'name',
    ];

	//
    /**
     * Get the emails for a tag
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function emails()
    {
        return $this->belongsToMany('Incremently\Email');
    }
}
