<?php

return [
    'singular'   => 'City',
    'plural'     => 'Cities',
    'address'    => 'Address in details',
    'empty'      => 'There are no cities yet.',
    'select'     => 'Select City',
    'perPage'    => 'Cities Per Page',
    'filter'     => 'Search for city',
    'actions'    => [
        'list'   => 'List all',
        'create' => 'Create City',
        'show'   => 'Show City',
        'edit'   => 'Edit City',
        'delete' => 'Delete City',
        'save'   => 'Save',
        'filter' => 'Filter',
    ],
    'messages'   => [
        'created' => 'The city has been created successfully.',
        'updated' => 'The city has been updated successfully.',
        'deleted' => 'The city has been deleted successfully.',
    ],
    'attributes' => [
        'name'       => 'City Name',
        '%name%'     => 'City Name',
        'country_id' => 'Country',
    ],
    'dialogs'    => [
        'delete' => [
            'title'   => 'Warning !',
            'info'    => 'Are you sure you want to delete the city ?',
            'confirm' => 'Delete',
            'cancel'  => 'Cancel',
        ],
    ],
];
