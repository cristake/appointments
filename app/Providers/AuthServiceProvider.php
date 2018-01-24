<?php

namespace App\Providers;

use App\Role;
use App\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        $user = \Auth::user();

        
        // Auth gates for: User management
        Gate::define('user_management_access', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Roles
        Gate::define('role_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('role_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Users
        Gate::define('user_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('user_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Employees
        Gate::define('employee_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('employee_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('employee_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Contact management
        Gate::define('contact_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Contact companies
        Gate::define('contact_company_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_company_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Contacts
        Gate::define('contact_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('contact_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('contact_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: User actions
        Gate::define('user_action_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Equipments
        Gate::define('equipment_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('equipment_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('equipment_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('equipment_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('equipment_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

        // Auth gates for: Task management
        Gate::define('task_management_access', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Tasks
        Gate::define('task_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('task_create', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_edit', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_view', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });
        Gate::define('task_delete', function ($user) {
            return in_array($user->role_id, [1, 2]);
        });

        // Auth gates for: Statuses
        Gate::define('status_access', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_create', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_edit', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_view', function ($user) {
            return in_array($user->role_id, [1]);
        });
        Gate::define('status_delete', function ($user) {
            return in_array($user->role_id, [1]);
        });

    }
}
