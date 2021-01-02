<?php


return [
    'routes'=> [
        [
            'name' => 'dashboard',
            'controller' => \App\Http\Controllers\Panel\DashboardController::class,
            'except' => ['show', 'destroy'],
            'permission' => 'manage-dashboard',
            'permission_name' => 'مدیریت کاربران',
            'title' => 'داشبورد',
            'route' => 'panel.dashboard.index',
            'icon' => 'material-icons',
            'li_text'=>'people', // from: https://material.io/icons
            'parent-menu' => '',
            'order' => 1
        ],
        [
            'name' => 'users',
            'controller' => \App\Http\Controllers\Panel\UserController::class,
            'except' => ['show', 'destroy'],
            'permission' => 'manage-users',
            'permission_name' => 'مدیریت کاربران',
            'title' => 'کاربران',
            'route' => 'panel.users.index',
            'icon' => 'material-icons',
            'li_text'=>'people', // from: https://material.io/icons
            'parent-menu' => 'کاربران',
            'order' => 1
        ],
        [
            'name' => 'roles',
            'controller' => \App\Http\Controllers\Panel\RoleController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-roles',
            'permission_name' => 'مدیریت دسترسی به کاربران',
            'title' => 'نقش های کاربری',
            'route' => 'panel.roles.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'کاربران',
            'order' => 2
        ],
        [
            'name' => 'groups',
            'controller' => \App\Http\Controllers\Panel\GroupController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-groups',
            'permission_name' => 'مدیریت گروه های کاربری',
            'title' => 'گروه های کاربری',
            'route' => 'panel.groups.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'کاربران',
            'order' => 2
        ],
        [
            'name' => 'banks',
            'controller' => \App\Http\Controllers\Panel\BankController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-banks',
            'permission_name' => 'مدیریت بانک ها',
            'title' => 'بانک ها',
            'route' => 'panel.banks.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'currencies',
            'controller' => \App\Http\Controllers\Panel\CurrencyController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-currencies',
            'permission_name' => 'مدیریت ارز ها',
            'title' => 'ارز ها',
            'route' => 'panel.currencies.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'containers',
            'controller' => \App\Http\Controllers\Panel\ContainerController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-containers',
            'permission_name' => 'مدیریت کانتینر ها',
            'title' => 'کانتینر ها',
            'route' => 'panel.containers.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'spirals',
            'controller' => \App\Http\Controllers\Panel\SpiralController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-spirals',
            'permission_name' => 'مدیریت مارپیچ ها',
            'title' => 'مارپیچ ها',
            'route' => 'panel.spirals.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'sellers',
            'controller' => \App\Http\Controllers\Panel\SellerController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-sellers',
            'permission_name' => 'مدیریت فروشنده ها',
            'title' => 'فروشنده ها',
            'route' => 'panel.sellers.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'system_controls',
            'controller' => \App\Http\Controllers\Panel\SystemControlController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-system-controls',
            'permission_name' => 'مدیریت کنترل ها',
            'title' => 'کنترل ها',
            'route' => 'panel.system_controls.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'machine_models',
            'controller' => \App\Http\Controllers\Panel\MachineModelControlController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-machine-models',
            'permission_name' => 'مدیریت مدل های دستگاه',
            'title' => 'مدل های دستگاه',
            'route' => 'panel.machine_models.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => 'تعاریف پایه',
            'order' => 2
        ],
        [
            'name' => 'orders',
            'controller' => \App\Http\Controllers\Panel\OrderController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-orders',
            'permission_name' => 'مدیریت سفارشات',
            'title' => 'سفارشات',
            'route' => 'panel.orders.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'parent-menu' => '',
            'order' => 2
        ],
    ],
];
