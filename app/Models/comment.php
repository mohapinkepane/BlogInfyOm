<?php

namespace App\Models;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class comment
 * @package App\Models
 * @version February 14, 2018, 9:04 pm UTC
 *
 * @property  body
 */
class comment extends Model
{
    use SoftDeletes;

    public $table = 'comments';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'body','post_id'
    ];
   
    //my mutation
    public function post()
    {
        return $this->belongsTo(Post::class);

    }

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
         
        'body' => 'min:2'
    ];

}
