<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Seccion
 * @package App\Models
 * @version November 7, 2018, 4:35 pm UTC
 *
 * @property \App\Models\Story story
 * @property integer id_story
 * @property string name
 * @property string description
 * @property string url
 * @property string audio_url
 */
class Seccion extends Model
{
    use SoftDeletes;

    public $table = 'section';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'id_story',
        'name',
        'description',
        'url',
        'audio_url'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_story' => 'integer',
        'name' => 'string',
        'description' => 'string',
        'url' => 'string',
        'audio_url' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function story()
    {
        return $this->belongsTo(\App\Models\Story::class);
    }
}
