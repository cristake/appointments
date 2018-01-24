<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Equipment
 *
 * @package App
 * @property string $name
 * @property tinyInteger $is_available
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

    protected $fillable = ['name', 'is_available'];
    
    
    public static function boot()
    {
        parent::boot();

        Equipment::observe(new \App\Observers\UserActionsObserver);
    }
    
}
