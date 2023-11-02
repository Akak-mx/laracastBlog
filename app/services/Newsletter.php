<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter {

    public function __construct(public ApiClient $client) {
    }

    public function subscribe(string $email, $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($list, [
            'email_address' => $email,
            'status' => 'subscribed',
        ]);
    }

    public function unsubscribe(string $email, $list = null)
    {
        $list ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->deleteListMember($list, $email);
    }
}
