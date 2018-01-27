<?php
namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Employee
 *
 * @package App
 * @property string $first_name
 * @property string $last_name
 * @property string $job_title
 * @property string $email
 * @property string $phone
*/
class Employee extends Model
{
    use SoftDeletes;

    protected $fillable = ['first_name', 'last_name', 'job_title', 'email', 'phone', 'department_id'];
    
    
    public static function boot()
    {
        parent::boot();

        Employee::observe(new \App\Observers\UserActionsObserver);
    }

    /**
     * Get the employee's full name.
     *
     * @return string
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }

    /**
     * Set to null if empty
     * @param $input
     */
    public function setDepartmentIdAttribute($input)
    {
        $this->attributes['department_id'] = $input ? $input : null;
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id')->withTrashed();
    } 

}
