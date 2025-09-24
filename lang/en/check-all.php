<?php

return [
    'actions'  => [
        'delete'  => 'Delete Selected',
        'restore' => 'Restore Selected',
    ],
    'messages' => [
        'deleted'     => 'The :type has been deleted successfully.',
        'not_deleted' => 'The :type can not be deleted.',
        'restored'    => 'The :type has been restored successfully.',
        'changed'     => 'The :type has been changed successfully.',
    ],
    'dialogs'  => [
        'delete'       => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to delete the :type ?',
            'confirm' => 'Delete',
            'cancel'  => 'Cancel',
        ],
        'restore'      => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to restore the :type ?',
            'confirm' => 'Restore',
            'cancel'  => 'Cancel',
        ],
        'forceDelete'  => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to force delete the :type ?',
            'confirm' => 'Force Delete',
            'cancel'  => 'Cancel',
        ],
        'changeType'   => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to change the :type type ?',
            'confirm' => 'Change',
            'cancel'  => 'Cancel',
        ],
        'changeActive' => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to change the :type status ?',
            'confirm' => 'Change',
            'cancel'  => 'Cancel',
        ],
    ],
];
