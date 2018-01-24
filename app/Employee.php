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

    protected $fillable = ['first_name', 'last_name', 'job_title', 'email', 'phone'];
    
    
    public static function boot()
    {
        parent::boot();

        Employee::observe(new \App\Observers\UserActionsObserver);
    }
    
}
