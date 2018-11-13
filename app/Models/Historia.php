<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Historia
 * @package App\Models
 * @version November 7, 2018, 4:35 pm UTC
 *
 * @property \App\Models\Category category
 * @property \Illuminate\Database\Eloquent\Collection Section
 * @property string name
 * @property integer state
 * @property string url
 * @property string url_banner
 * @property integer id_category
 */
class Historia extends Model
{
    use SoftDeletes;

    public $table = 'story';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'state',
        'url',
        'url_banner',
        'id_category'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'name' => 'string',
        'state' => 'integer',
        'url' => 'string',
        'url_banner' => 'string',
        'id_category' => 'integer'
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
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function sections()
    {
        return $this->hasMany(\App\Models\Section::class);
    }
}
