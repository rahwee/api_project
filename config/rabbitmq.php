<?php

return [

    /*
    |--------------------------------------------------------------------------
    | RabbitMQ Default Connection
    |--------------------------------------------------------------------------
    |
    | Here you may define the default RabbitMQ connection. This connection will
    | be used as the default for all messaging operations unless a different
    | connection is explicitly specified when performing the operation.
    |
    */

    'default' => env('RABBITMQ_CONNECTION', 'default'),

    /*
    |--------------------------------------------------------------------------
    | RabbitMQ Connections
    |--------------------------------------------------------------------------
    |
    | Here are each of the RabbitMQ connections setup for your application.
    | The name of the connection should be in lowercase letters.
    |
    */

    'connections' => [

        'default' => [
            'host'     => env('RABBITMQ_HOST', 'localhost'),
            'port'     => env('RABBITMQ_PORT', 5672),
            'vhost'    => env('RABBITMQ_VHOST', '/'),
            'username' => env('RABBITMQ_USERNAME', 'guest'),
            'password' => env('RABBITMQ_PASSWORD', 'guest'),
            'options' => [
                'ssl_options' => [
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
                'exchange' => [
    
                    'name' => env('RABBITMQ_EXCHANGE_NAME'),
        
                    /*
                     * Determine if exchange should be created if it does not exist.
                     */
                    
                    'declare' => (bool) env('RABBITMQ_EXCHANGE_DECLARE', true),
        
                    /*
                     * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
                     */
                     
                    'type'        => env('RABBITMQ_EXCHANGE_TYPE', 'direct'),
                    'passive'     => (bool)env('RABBITMQ_EXCHANGE_PASSIVE', false),
                    'durable'     => (bool)env('RABBITMQ_EXCHANGE_DURABLE', true),
                    'auto_delete' => (bool)env('RABBITMQ_EXCHANGE_AUTODELETE', false),
                    'arguments'   => env('RABBITMQ_EXCHANGE_ARGUMENTS'),
                ],
        
                'queue' => [
        
                    /*
                     * Determine if queue should be created if it does not exist.
                     */
                    
                    'declare' => (bool)env('RABBITMQ_QUEUE_DECLARE', true),
        
                    /*
                     * Determine if queue should be binded to the exchange created.
                     */
                    
                    'bind' => (bool)env('RABBITMQ_QUEUE_DECLARE_BIND', true),
        
                    /*
                     * Read more about possible values at https://www.rabbitmq.com/tutorials/amqp-concepts.html
                     */
                     
                    'passive' => (bool)env('RABBITMQ_QUEUE_PASSIVE', false),
                    'durable' => (bool)env('RABBITMQ_QUEUE_DURABLE', true),
                    'exclusive' => (bool)env('RABBITMQ_QUEUE_EXCLUSIVE', false),
                    'auto_delete' => (bool)env('RABBITMQ_QUEUE_AUTODELETE', false),
                    'arguments' => env('RABBITMQ_QUEUE_ARGUMENTS'),
                ],
            ],
        ],

    ],

    'response' => [
        "RABBITMQ_WEBSOCKET_URL"       => env('RABBITMQ_WEBSOCKET_URL', 'wss://localhost/ws'),
        "RABBITMQ_HOST"                => env('RABBITMQ_HOST', 'localhost'),
        "RABBITMQ_PORT"                => env('RABBITMQ_PORT', 5672),
        "RABBITMQ_USERNAME"            => env('RABBITMQ_USERNAME', 'guest'),
        "RABBITMQ_PASSWORD"            => env('RABBITMQ_PASSWORD', 'guest'),
        "RABBITMQ_EXCHANGE_TYPE"       => "direct",
        "RABBITMQ_EXCHANGE_PASSIVE"    => false,
        "RABBITMQ_EXCHANGE_DURABLE"    => true,
        "RABBITMQ_EXCHANGE_AUTODELETE" => false,
        "RABBITMQ_QUEUE_PASSIVE"       => false,
        "RABBITMQ_QUEUE_DURABLE"       => true,
        "RABBITMQ_QUEUE_EXCLUSIVE"     => false,
        "RABBITMQ_QUEUE_AUTODELETE"    => false
    ]
];
