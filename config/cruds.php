<?php


return [
    'routes'=> [
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
            'controller' => \saeedkarimmi\cms\Controllers\Panel\RoleController::class,
            'except' => ['show','destroy'],
            'permission' => 'manage-roles',
            'permission_name' => 'مدیریت دسترسی به کاربران',
            'title' => 'گروه های کاربری',
            'route' => 'panel.roles.index',
            'icon' => 'material-icons',
            'li_text'=>'lock',
            'index_desc' => 'لیست گروهای کاربری و دسترسی ها',
            'create_desc' => 'درج گروه کاربری و دسترسی هایش جدید',
            'edit_desc' => 'ویرایش یک گروه کاربری و دسترسی هایش',
            'parent-menu' => 'کاربران',
            'order' => 2
        ]
    ],
];