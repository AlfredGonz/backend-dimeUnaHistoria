<?php

namespace App\Repositories;

use App\Models\Seccion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SeccionRepository
 * @package App\Repositories
 * @version November 7, 2018, 4:35 pm UTC
 *
 * @method Seccion findWithoutFail($id, $columns = ['*'])
 * @method Seccion find($id, $columns = ['*'])
 * @method Seccion first($columns = ['*'])
*/
class SeccionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'id_story',
        'name',
        'description',
        'url',
        'audio_url'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Seccion::class;
    }
}
