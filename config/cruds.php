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
            'parent-menu' => '',
            'order' => 2
        ],
    ],
];