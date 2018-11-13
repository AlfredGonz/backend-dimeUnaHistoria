<?php

namespace App\Repositories;

use App\Models\Historia;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class HistoriaRepository
 * @package App\Repositories
 * @version November 7, 2018, 4:35 pm UTC
 *
 * @method Historia findWithoutFail($id, $columns = ['*'])
 * @method Historia find($id, $columns = ['*'])
 * @method Historia first($columns = ['*'])
*/
class HistoriaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
        'state',
        'url',
        'url_banner',
        'id_category'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Historia::class;
    }
}
