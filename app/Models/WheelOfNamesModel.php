<?php

namespace App\Models;

use GuzzleHttp\Client;

class WheelOfNamesModel extends Model
{
    private $apiKey = '5af6156b-6f5c-4779-8695-cda0b9a1c1f3';
    private $baseUrl = 'https://api.wheelofnames.com/v1';

    public function createWheel($name, $entries)
    {
        $client = new Client();
        $response = $client->post($this->baseUrl . '/wheels', [
            'headers' => [
                'Authorization' => 'Bearer ' . $this->apiKey
            ],
            'json' => [
                'name' => $name,
                'entries' => $entries
            ]
        ]);

        return json_decode($response->getBody()->getContents(), true);
    }

    // Other methods for updating, deleting, and spinning wheels
}