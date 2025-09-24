<!doctype html>
<html dir="{{ Locales::getDir() }}" lang="{{ app()->getLocale() }}">
<head>
    <title>{{ 'Chat' .' | '. app_name() }}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="PUSHER_APP_KEY" content="{{ config('broadcasting.connections.pusher.key') }}">
    <meta name="PUSHER_APP_CLUSTER" content="{{ config('broadcasting.connections.pusher.options.cluster') }}">
    <meta name="PUSHER_APP_HOST" content="{{ config('broadcasting.connections.pusher.options.host') }}">
    <meta name="PUSHER_APP_PORT" content="{{ config('broadcasting.connections.pusher.options.port') }}">
    <meta name="PUSHER_APP_ENCRYPTED" content="{{ config('broadcasting.connections.pusher.options.useTLS') }}">

    <link rel="icon" href="{{ app_favicon() }}" type="image/x-icon"/>

    <!-- styles -->
    @vite([
     'Modules/Chats/Resources/assets/js/chat/chat.js',
            'Modules/Chats/Resources/assets/scss/chat/chat.scss',
 ])

    @stack('css')
</head>

<body>

<!-- start  layout wrapper -->
<div id="vue">
    <chat-container></chat-container>
</div>
<!-- end  layout wrapper -->


<!-- JAVASCRIPT -->
@routes
@stack('js')
</body>
</html>
