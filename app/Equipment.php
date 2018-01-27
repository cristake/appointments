<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipment
 *
 * @package App
 * @property string $name
 * @property tinyInteger $speed
 * @property tinyInteger $link
*/
class Equipment extends Model
{
    use SoftDeletes;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'equipments';

    protected $fillable = ['name', 'color', 'speed', 'link'];
    
    
    public static function boot()
    {
        parent::boot();

        Equipment::observe(new \App\Observers\UserActionsObserver);
    }
    
}
