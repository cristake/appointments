<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Department
 *
 * @package App
 * @property string $name
*/
class Department extends Model
{
    use SoftDeletes;

    protected $fillable = ['name'];
    
    
    public static function boot()
    {
        parent::boot();

        Department::observe(new \App\Observers\UserActionsObserver);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class, 'department_id');
    }
}
