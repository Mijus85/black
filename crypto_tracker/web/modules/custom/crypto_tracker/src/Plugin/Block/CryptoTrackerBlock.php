<?php

namespace Drupal\crypto_tracker\Plugin\Block;

use Drupal\Core\Pager\PagerManagerInterface;
use Drupal\Core\Pager\PagerParametersInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Block\BlockPluginInterface;
use Drupal\crypto_tracker\Controller\CryptoTracker;
use Drupal\Core\Database\Query\PagerSelectExtender;

/**
 * @Block(
 * id = "cryptoblock",
 * admin_label = @Translation("Crypto Block"),
 * )
 */
class CryptoTrackerBlock extends BlockBase {

    public function build() {

        $cryptos = [];
        $database = \Drupal::database();
        $query = $database->select('crypto_currency','cc');
        $query->fields('cc',['coin_id','name','symbol','rank']);

        $record = $query->extend('Drupal\Core\Database\Query\PagerSelectExtender')->limit(10)->execute()->fetchAll();
         foreach($record as $value) {
         $cryptos[] = $value;
        }


         $render['crypto'] = [
            '#theme' => 'crypto_tracker_block',
            '#cryptos' => $cryptos,

        ];

        $render['pager'] = [
            '#type' => 'pager',

        ];

        return $render;
    }




}
