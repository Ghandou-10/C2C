<?php

Breadcrumbs::for('dashboard.chats.index', function ($breadcrumb) {
    $breadcrumb->parent('dashboard.home');
    $breadcrumb->push(trans('chats::chats.plural'), route('dashboard.chats.index'));
});
