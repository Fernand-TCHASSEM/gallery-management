<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['posted_date', 'lasted_edit', 'deleted_at'];

    const CREATED_AT = 'posted_date';
    const UPDATED_AT = 'lasted_edit';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'galleries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'pictures', 'description'
    ];

}
