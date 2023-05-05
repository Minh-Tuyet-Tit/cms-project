<?php

return [
    [
        'lable' => 'Dasboard',
        'link' => 'admin',
        'icon' => 'fas fa-tachometer-alt',
    ],
    [
        'lable' => 'Category Manager',
        'link' => '#',
        'icon' => 'fas fa-tasks',
        'items' => [
            [
                'lable' => 'Category Product',
                'link' => 'admin/category-product',
                'icon' => 'fab fa-product-hunt'
            ],
            [
                'lable' => 'Category Post',
                'link' => 'admin/category-post',
                'icon' => 'fab fa-product-hunt'
            ],
        ]
    ],
    [
        'lable' => 'Products and Posts',
        'link' => '#',
        'icon' => 'fas fa-mail-bulk',
        'items' => [
            [
                'lable' => 'All Products',
                'link' => 'admin/product',
                'icon' => 'fab fa-product-hunt'
            ],
            [
                'lable' => 'All Posts',
                'link' => 'admin/post',
                'icon' => 'fab fa-product-hunt'
            ],
        ]
    ],
    [
        'lable' => 'Users',
        'link' => 'admin/user',
        'icon' => 'fas fa-user',

    ],
    [
        'lable' => 'Images Manager',
        'link' => '#',
        'icon' => 'fas fa-images',
        'items' => [
            [
                'lable' => 'Image Galery',
                'link' => 'admin/imagegalery',
                'icon' => 'fab fa-envira'
            ],
            [
                'lable' => 'Image Slide Show',
                'link' => 'admin/imageslideshow',
                'icon' => 'fas fa-sliders-h'
            ],
        ]
    ],
    [
        'lable' => 'Setting',
        'link' => '#',
        'icon' => 'fas fa-cog',
        'items' => [
            [
                'lable' => 'Config',
                'link' => 'admin/config',
                'icon' => 'fas fa-check-double'
            ],
            [
                'lable' => 'Status',
                'link' => 'admin/status',
                'icon' => 'fas fa-toggle-on'
            ],
            [
                'lable' => 'FlieType',
                'link' => 'admin/filetype',
                'icon' => 'fas fa-file'
            ],
            [
                'lable' => 'Position',
                'link' => 'admin/position',
                'icon' => 'fab fa-deezer'
            ],
            [
                'lable' => 'Resource',
                'link' => 'admin/resource',
                'icon' => 'fab fa-sourcetree'
            ],
        ]
    ]
];
