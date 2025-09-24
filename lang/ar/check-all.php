<?php

return [
    'actions'  => [
        'delete'  => 'حذف المحدد',
        'restore' => 'استعادة المحدد',
    ],
    'messages' => [
        'deleted'     => 'تم حذف :type بنجاح.',
        'not_deleted' => 'لا يمكن حذف :type.',
        'restored'    => 'تم استعادة :type بنجاح.',
        'changed'     => 'تم تغيير :type بنجاح.',
    ],
    'dialogs'  => [
        'delete'       => [
            'title'   => 'تحذير !',
            'info'    => 'هل أنت متأكد انك تريد حذف :type',
            'confirm' => 'حذف',
            'cancel'  => 'إلغاء',
        ],
        'restore'      => [
            'title'   => 'تحذير !',
            'info'    => 'هل أنت متأكد انك تريد استعادة :type',
            'confirm' => 'استعادة',
            'cancel'  => 'إلغاء',
        ],
        'forceDelete'  => [
            'title'   => 'تحذير !',
            'info'    => 'هل أنت متأكد انك تريد حذف :type نهائياً',
            'confirm' => 'حذف نهائي',
            'cancel'  => 'إلغاء',
        ],
        'changeType'   => [
            'title'   => 'تحذير !',
            'info'    => 'هل أنت متأكد انك تريد تغيير نوع :type؟',
            'confirm' => 'تغيير',
            'cancel'  => 'إلغاء',
        ],
        'changeActive' => [
            'title'   => 'تحذير !',
            'info'    => 'هل أنت متأكد انك تريد تغيير حالة :type؟',
            'confirm' => 'تغيير',
            'cancel'  => 'إلغاء',
        ],
    ],
];
