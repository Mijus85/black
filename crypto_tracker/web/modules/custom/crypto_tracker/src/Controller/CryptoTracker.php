<?php

namespace Drupal\crypto_tracker\Controller;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Drupal\Core\Entity\EntityTypeManager;
use Drupal\Core\Controller\ControllerBase;

class CryptoTracker extends ControllerBase {

  public function getCoins() {

    $client = new Client();
    $coins = [
    'id' => ' ',
    'name' => ' ',
    'symbol' => ' ',
    'rank' => ' ',
    ];
    $limit = 0;



try {
  $response = $client->get('https://api.coinpaprika.com/v1/coins');
  $result = json_decode($response->getBody()->getContents(), TRUE);
  foreach($result as $coins) {
    $coin[$coins['id']] = [
      'id' => $coins['id'],
      'name' => $coins['name'],
      'symbol' => $coins['symbol'],
      'rank' => $coins['rank']
    ];
     if (++$limit == 100) break;
   }



   /** @var \Drupal\Core\Database\Connection $connection */
   $connection = \Drupal::service('database');
   foreach($coin as $item) {
   $query = $connection->insert('crypto_currency');
   $query->fields([
     'coin_id',
     'name',
     'symbol',
     'rank',
     ]);
   $query->values([
    $item['id'],
    $item['name'],
    $item['symbol'],
    $item['rank'],
     ]);
   $query->execute();
  }
}
 catch (RequestException $e) {
  // log exception
    }
  }

  public function resultsPage() {
        $cryptos = [];
        $database = \Drupal::database();
        $query = $database->select('crypto_currency','cc')->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit(10);
        $query->fields('cc',['coin_id','name','symbol','rank']);
        $query->orderBy('rank');
        $record = $query->execute()->fetchAll();
         foreach($record as $value) {
         $cryptos[] = $value;
        }


         $render['crypto'] = [
            '#theme' => 'crypto_results',
            '#cryptos' => $cryptos,

        ];

        $render['pager'] = [
            '#type' => 'pager'


        ];

        dpm($render);
        return $render;
  }
}
