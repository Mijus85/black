<?php
/**
 * @file
 * Contains the Crypto Tracker Service
 */
namespace Drupal\crypto_tracker;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

$client = new Client();
$coins = [];

try {
  $response = $client->get('https://api.coinpaprika.com/v1/coins');
  $result = json_decode($response->getBody()->getContents(), TRUE);
  foreach($result['results'] as $item) {
    $coins[] = $item['id'];  
   }

  return $result;
}
 catch (RequestException $e) { 
  // log exception
 } 
