<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Post
 * @package App\Models
 * @version February 13, 2018, 6:52 pm UTC
 */
class Post extends Model
{
    use SoftDeletes;

    public $table = 'posts';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'title',
        'body',
        'user_id'
    ];

    //my mutations
    public function comments()
    {
        return $this->hasMany(comment::class);
    }

    public function addComment($body)
    {

        $this->comments()->create(compact('body'));
    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'body' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'title' => 'required',
        'body' => 'min:2'
    ];

    
}
