<?php

namespace App\Repositories;

use App\Models\comment;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class commentRepository
 * @package App\Repositories
 * @version February 14, 2018, 9:04 pm UTC
 *
 * @method comment findWithoutFail($id, $columns = ['*'])
 * @method comment find($id, $columns = ['*'])
 * @method comment first($columns = ['*'])
*/
class commentRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'body'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return comment::class;
    }
}
