@inject('request', 'Illuminate\Http\Request')
<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">

             

            <li class="{{ $request->segment(1) == 'home' ? 'active' : '' }}">
                <a href="{{ url('/') }}">
                    <i class="fa fa-wrench"></i>
                    <span class="title">@lang('quickadmin.qa_dashboard')</span>
                </a>
            </li>

            
            @can('equipment_access')
            <li class="{{ $request->segment(2) == 'equipments' ? 'active' : '' }}">
                <a href="{{ route('admin.equipments.index') }}">
                    <i class="fa fa-print"></i>
                    <span class="title">@lang('quickadmin.equipments.title')</span>
                </a>
            </li>
            @endcan

            @can('employee_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-briefcase"></i>
                    <span class="title">@lang('quickadmin.employee-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('employee_access')
                <li class="{{ $request->segment(2) == 'employees' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.employees.index') }}">
                            <i class="fa fa-address-card"></i>
                            <span class="title">
                                @lang('quickadmin.employees.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('department_access')
                <li class="{{ $request->segment(2) == 'departments' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.departments.index') }}">
                            <i class="fa fa-puzzle-piece"></i>
                            <span class="title">
                                @lang('quickadmin.departments.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            
            <!-- @can('task_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-calendar-check-o"></i>
                    <span class="title">@lang('quickadmin.task-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu"> -->
                
                @can('task_access')
                <li class="{{ $request->segment(2) == 'tasks' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.tasks.index') }}">
                            <i class="fa fa-list-alt"></i>
                            <span class="title">
                                @lang('quickadmin.tasks.title')
                            </span>
                        </a>
                    </li>
                @endcan
                <!-- @can('status_access')
                <li class="{{ $request->segment(2) == 'statuses' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.statuses.index') }}">
                            <i class="fa fa-list-ul"></i>
                            <span class="title">
                                @lang('quickadmin.statuses.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan -->

            @can('contact_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-phone-square"></i>
                    <span class="title">@lang('quickadmin.contact-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('contact_company_access')
                <li class="{{ $request->segment(2) == 'contact_companies' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.contact_companies.index') }}">
                            <i class="fa fa-building-o"></i>
                            <span class="title">
                                @lang('quickadmin.contact-companies.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('contact_access')
                <li class="{{ $request->segment(2) == 'contacts' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-user-plus"></i>
                            <span class="title">
                                @lang('quickadmin.contacts.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan
            @can('user_management_access')
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-users"></i>
                    <span class="title">@lang('quickadmin.user-management.title')</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                
                @can('role_access')
                <li class="{{ $request->segment(2) == 'roles' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.roles.index') }}">
                            <i class="fa fa-briefcase"></i>
                            <span class="title">
                                @lang('quickadmin.roles.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_access')
                <li class="{{ $request->segment(2) == 'users' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-user"></i>
                            <span class="title">
                                @lang('quickadmin.users.title')
                            </span>
                        </a>
                    </li>
                @endcan
                @can('user_action_access')
                <li class="{{ $request->segment(2) == 'user_actions' ? 'active active-sub' : '' }}">
                        <a href="{{ route('admin.user_actions.index') }}">
                            <i class="fa fa-th-list"></i>
                            <span class="title">
                                @lang('quickadmin.user-actions.title')
                            </span>
                        </a>
                    </li>
                @endcan
                </ul>
            </li>
            @endcan

            

            



            <li class="{{ $request->segment(1) == 'change_password' ? 'active' : '' }}">
                <a href="{{ route('auth.change_password') }}">
                    <i class="fa fa-key"></i>
                    <span class="title">@lang('quickadmin.qa_change_password')</span>
                </a>
            </li>

            <li>
                <a href="#logout" onclick="$('#logout').submit();">
                    <i class="fa fa-arrow-left"></i>
                    <span class="title">@lang('quickadmin.qa_logout')</span>
                </a>
            </li>
        </ul>
    </section>
</aside>

