<?php

namespace app\elementApi;

use craft\elements\Entry;
use League\Fractal\TransformerAbstract;

class TestTransformer extends TransformerAbstract
{
    public function transform(Entry $entry)
    {
        $messages = Entry::find();
        $messages
            ->section('messages')
            ->relatedTo([
                'targetElement' => $entry,
            ])
            ->orderBy([
                'title' => 'DESC',
            ]);

        $messageData = [];
        foreach ($messages->all() as $message) {
            $messageData[] = [
                'id' => $message->id,
                'url' => $message->slug,
                'title' => $message->title,
            ];
        }

        return [
            'id' => $entry->id,
            'url' => $entry->slug,
            'title' => $entry->title,
            'msg' => $messageData,
        ];
    }
}
