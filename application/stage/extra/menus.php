<?php
return [
    'index' => [
        'name' => '首页',
        'icon' => 'icon-home',
        'index' => 'index/index',
    ],
    'admin' => [
        'name' => '管理员',
        'icon' => 'icon-guanliyuan',
        'index' => 'admin.user/index',
        'submenu' => [
            [
                'name' => '管理员列表',
                'index' => 'admin.user/index',
                'uris' => [
                    'admin.user/index',
                    'admin.user/add',
                    'admin.user/edit',
                    'admin.user/delete',
                ],
            ],
            [
                'name' => '角色管理',
                'index' => 'admin.role/index',
                'uris' => [
                    'admin.role/index',
                    'admin.role/add',
                    'admin.role/edit',
                    'admin.role/delete',
                ],
            ],
			[
			    'name' => '权限管理',
			    'index' => 'admin.access/index',
			    'uris' => [
			        'admin.access/index',
			        'admin.access/add',
			        'admin.access/edit',
			        'admin.access/delete',
			    ],
			],
        ],
		
    ],
    'content' => [
		'name' => '案例管理',
		'icon' => 'icon-wenzhang',
		'index' => 'content.article/index',
		'submenu' => [
			[
			    'name' => '案例列表',
			    'index' => 'content.article/index',
			    'uris' => [
			        'content.article/index',
			        'content.article/add',
			        'content.article/edit',
			        'content.article/delete',
			    ],
			],
			[
			    'name' => '案例分类',
			    'index' => 'content.category/index',
			    'uris' => [
			        'content.category/index',
			        'content.category/add',
			        'content.category/edit',
			        'content.category/delete',
			    ],
			],
			[
			    'name' => '专题管理',
			    'index' => 'content.special/index',
			    'uris' => [
			        'content.special/index',
			        'content.special/add',
			        'content.special/edit',
			        'content.special/delete',
			    ],
			],
			[
			    'name' => '评论管理',
			    'index' => 'content.comment/index',
			    'uris' => [
			        'content.comment/index',
			    ],
			],
		],
	],	
	'setting' => [
		'name' => '设置',
		'icon' => 'icon-setting',
		'index' => 'setting/stage',
		'submenu'=>[
			[
			    'name' => '系统设置',
			    'index' => 'setting/stage',
			],
			[
			    'name' => '上传设置',
			    'index' => 'setting/storage',
			],
		]
	],
];
