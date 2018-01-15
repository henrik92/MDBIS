<?php
$params = [
    'index' => 'movies',
    'body' => [
        'settings' => [
            'number_of_shards' => 1,
            'number_of_replicas' => 1
        ],
        'mappings' => [
            'movie' => [
                '_source' => [
                    'enabled'=> true
                ],
                'properties' => [
                    'title' => [
                        'type' => 'text',
                        'analyzer' => 'standard'
                    ],
                    'rating_value' => [
                        'type' => 'float',
                    ],
                    'rating_counter' => [
                        'type' => 'integer',
                    ],
                     'rating_rank' => [
                        'type' => 'integer',
                    ],
                ]
            ]
        ]
    ]
    ];
    $result = json_encode($params);
    echo $result;
    ?>
