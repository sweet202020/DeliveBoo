<?php

return [

    'restaurants' => [
        [
            'restaurant_name' => 'Baia Angeli',
            'address' => ' Via giovanni 12',
            'opening_time' => '18/22',
            'delivery_price' => 2.50,
            'cover_image' => null,
            'partita_iva' => 'IT02312239157',
            'user_id' => 1
        ],
        [
            'restaurant_name' => 'Pizza & Delizia',
            'address' => ' Via Fantechi 12',
            'opening_time' => '18/22',
            'delivery_price' => 2.50,
            'cover_image' => null,
            'partita_iva' => 'IT02312589127',
            'user_id' => 2
        ],
        [
            'restaurant_name' => 'Il Vecchio Forno',
            'address' => ' Via Barbieri 17',
            'opening_time' => '17/23',
            'delivery_price' => 1.50,
            'cover_image' => null,
            'partita_iva' => 'IT12589764593',
            'user_id' => 3
        ],
        [
            'restaurant_name' => 'Il Vesuvio',
            'address' => ' Via Dolce 44',
            'opening_time' => '19/24',
            'delivery_price' => 3.50,
            'cover_image' => null,
            'partita_iva' => 'IT53789456218',
            'user_id' => 4
        ],
        [
            'restaurant_name' => 'La Salvia',
            'address' => ' Via Maremma 84',
            'opening_time' => '19/21',
            'delivery_price' => 3.00,
            'cover_image' => null,
            'partita_iva' => 'IT53789456132',
            'user_id' => 5
        ],
        [
            'restaurant_name' => 'Il Mercante',
            'address' => ' Via Carlo B. 94',
            'opening_time' => '17/22',
            'delivery_price' => 1.50,
            'cover_image' => null,
            'partita_iva' => 'IT53769476218',
            'user_id' => 6
        ],
        [
            'restaurant_name' => 'La Merenda',
            'address' => ' Via Alto D. 65',
            'opening_time' => '12/20',
            'delivery_price' => 0.50,
            'cover_image' => null,
            'partita_iva' => 'IT53789657228',
            'user_id' => 7
        ],
        [
            'restaurant_name' => 'Da Mario',
            'address' => ' Via Rana 40',
            'opening_time' => '17/24',
            'delivery_price' => 2.50,
            'cover_image' => null,
            'partita_iva' => 'IT53339456218',
            'user_id' => 8
        ],
        [
            'restaurant_name' => 'Il Passatore',
            'address' => ' Via Eugenio M. 12',
            'opening_time' => '19/24',
            'delivery_price' => 1.00,
            'cover_image' => null,
            'partita_iva' => 'IT53789453219',
            'user_id' => 9
        ],
        [
            'restaurant_name' => 'Tiffany',
            'address' => ' Via Faenza 14',
            'opening_time' => '18/24',
            'delivery_price' => 2.50,
            'cover_image' => null,
            'partita_iva' => 'IT53789452217',
            'user_id' => 10
        ],

    ],
    'types' => [
        [
            'name' => 'pizza',
        ],
        [
            'name' => 'carne',
        ],
        [
            'name' => 'fastfood',
        ],
        [
            'name' => 'insalate',
        ],
        [
            'name' => 'piadine',
        ],
        [
            'name' => 'hamburger',
        ],
        [
            'name' => 'sushi',
        ],
        [
            'name' => 'panini',
        ],
        [
            'name' => 'messicano',
        ],
        [
            'name' => 'pasta',
        ]

    ],
    'plates' => [
        [
            'name' => 'Pizza Margherita',
            'description' => 'pomodoro,mozzarella,origano',
            'price' => 5.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '2',
            'category_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'Pasta al Pomodoro',
            'description' => 'spaghetti al pomodoro',
            'price' => 6.50,
            'best_seller' => false,
            'visible' => true,
            'restaurant_id' => '2',
            'category_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'frittura Mista',
            'description' => 'calamari,polpo,aringhe',
            'price' => 12.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '3',
            'category_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'patatine',
            'description' => 'patatine fritte',
            'price' => 2.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '2',
            'category_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'coca-cola',
            'description' => 'coca-cola',
            'price' => 1.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '3',
            'category_id' => '2',
            'cover_image' => null,

        ],
        [
            'name' => 'birra',
            'description' => 'birra artigianale',
            'price' => 12.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '3',
            'category_id' => '2',
            'cover_image' => null,

        ],
        [
            'name' => 'acqua',
            'description' => 'acqua minerale naturale',
            'price' => 1.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '2',
            'category_id' => '2',
            'cover_image' => null,

        ],
        [
            'name' => 'Tagliata',
            'description' => 'tagliata di manzo con contorno di patate',
            'price' => 16.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '2',
            'category_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'Tofu in agrodolce',
            'description' => 'tofu in salsa agrodolce',
            'price' => 12.50,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '2',
            'category_id' => '1',
            'cover_image' => null,

        ],
        [
            'name' => 'Pizza Ciclista',
            'description' => 'pizza con poco pomodoro e verdure',
            'price' => 8.00,
            'best_seller' => true,
            'visible' => true,
            'restaurant_id' => '3',
            'category_id' => '1',
            'cover_image' => null,

        ],

    ],
    'orders' => [
        [
            'price' => 20,
            'customer_name' => 'Mattia Barbieri',
            'delivery_address' => 'Via Mazzolano 50',
            'phone_number' => '3781264589',
        ],
        [
            'price' => 15,
            'customer_name' => 'Rodrigo Fantechi',
            'delivery_address' => 'Via Irma Bandiera 3',
            'phone_number' => '3951257846',
        ],
        [
            'price' => 8,
            'customer_name' => 'Alessio Dolce',
            'delivery_address' => 'Via Faentina 23',
            'phone_number' => '0555989751',
        ],
    ]


];
