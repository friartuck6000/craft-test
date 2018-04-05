<?php

use craft\elements\Entry;

return [
    'endpoints' => [
        'api/messages' => [
            'elementType' => Entry::class,
            'criteria' => [
                'section' => 'messageSeries',
            ],
            'transformer' => new \app\elementApi\TestTransformer(),
        ],

        'api/messages/<seriesSlug>/<messageSlug>' => function($seriesSlug, $messageSlug) {
            $series = Entry::find()
                ->section('messageSeries')
                ->slug($seriesSlug)
                ->one();

            return [
                'elementType' => Entry::class,
                'one' => true,
                'criteria' => [
                    'section' => 'messages',
                    'slug' => $messageSlug,
                    'relatedTo' => [
                        'targetElement' => $series,
                    ],
                ],
            ];
        },
    ],
];
