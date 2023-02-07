<?php

return [
    'users'=>[
        [
            'name' => 'Rodrigo',
            'email' => ' r@example.it',
            'password' => '$2y$10$CLJSRTn6AvW38T74HNg6oexGXxH4Oz1GpGuTEh0nF4g770OHwwr3a',
        ],
        [
            'name' => 'Alessio',
            'email' => ' a@example.it',
            'password' => '$2y$10$CLJSRTn6AvW38T74HNg6oexGXxH4Oz1GpGuTEh0nF4g770OHwwr3a',
        ], [
            'name' => 'Mattia',
            'email' => ' m@example.it',
            'password' => '$2y$10$CLJSRTn6AvW38T74HNg6oexGXxH4Oz1GpGuTEh0nF4g770OHwwr3a',
        ]
    ],
    'restaurants' => [
        [
            'restaurant_name' => 'Pizza & Delizia',
            'address' => ' Via Fantechi 12',
            'opening_time' => '18/22',
            'delivery_price' => 2.50,
            'cover_image' => null,
            'partita_iva' => 'IT02312589127',
            'user_id' => 1
        ],
        [
            'restaurant_name' => 'Il Vecchio Forno',
            'address' => ' Via Barbieri 17',
            'opening_time' => '17/23',
            'delivery_price' => 1.50,
            'cover_image' => null,
            'partita_iva' => 'IT12589764593',
            'user_id' => 2
        ],
        [
            'restaurant_name' => 'Il Vesuvio',
            'address' => ' Via Dolce 44',
            'opening_time' => '19/24',
            'delivery_price' => 3.50,
            'cover_image' => null,
            'partita_iva' => 'IT53789456218',
            'user_id' => 3
        ],

    ],
    'types' => [
        [
            'name' => 'pizzeria',
        ],
        [
            'name' => 'trattoria',
        ],
        [
            'name' => 'ristorante',
        ]

    ],
    'plates' => [
        [
            'name' => 'Pizza Margherita',
            'description' => 'pomodoro,mozzarella,origano',
            'price' => 5.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'Pasta al Pomodoro',
            'description' => 'spaghetti al pomodoro',
            'price' => 6.50,
            'best_seller' => false,
            'visible' => true,
            'restaurant_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'frittura Mista',
            'description' => 'calamari,polpo,aringhe',
            'price' => 12.50,
            'best_seller' => true,
            'visible' => false,
            'restaurant_id' => '2',
            'cover_image' => null,

        ],
       
    ],
    'orders' =>[
        [
            'price'=>20,
            'customer_name'=>'Mattia Barbieri',
            'delivery_address'=>'Via Mazzolano 50',
            'phone_number'=>'3781264589',
        ],
        [
            'price'=>15,
            'customer_name'=>'Rodrigo Fantechi',
            'delivery_address'=>'Via Irma Bandiera 3',
            'phone_number'=>'3951257846',
        ],
        [
            'price'=>8,
            'customer_name'=>'Alessio Dolce',
            'delivery_address'=>'Via Faentina 23',
            'phone_number'=>'0555989751',
        ],
    ]


];
