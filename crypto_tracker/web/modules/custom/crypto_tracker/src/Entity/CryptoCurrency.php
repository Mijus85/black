<?php

namespace Drupal\crypto_tracker\Entity;

use Drupal\Core\Database\Connection;
use Drupal\node\Entity\NodeType;
use Drupal\Core\Entity\ContentEntityBase;
use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\Entity\EntityTypeInterface;
use Drupal\Core\Entity\ContentEntityInterface;
use Drupal\Core\Entity\Annotation\ContentEntityType;
use Drupal\crypto_tracker\Controller\CryptoTracker;

/**
 * Defines the Crypto Currency entity.
 *
 * @ingroup crypto_currency
 *
 * @ContentEntityType(
 *   id = "crypto_currency",
 *   label = @Translation("Crypto Currency"),
 *   handlers = {
 *     "view_builder" = "Drupal\Core\Entity\EntityViewBuilder",
 *     "list_builder" = "Drupal\content_entity_example\ContactListBuilder",
 *     "views_data" = "Drupal\views\EntityViewsData",
 *    },
 *   base_table = "crypto_currency",
 *   entity_keys = {
 *     "id" = "id",
 *     "coin_id" = "coin_id",
 *     "name" = "name",
 *     "symbol" = "symbol",
 *     "rank" = "rank",
 *   },
 * )
 */

class CryptoCurrency extends ContentEntityBase implements ContentEntityInterface {

  public static function baseFieldDefinitions(EntityTypeInterface $entity_type) {
    
    $fields['id'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('ID'))
      ->setDescription(t('The ID of the Crypto Currency entity.'))
      ->setReadOnly(TRUE);

    $fields['coin_id'] = BaseFieldDefinition::create('string')
      ->setLabel(t('COIN_ID'))
      ->setDescription(t('The COIN ID of the Crypto Currency entity.'))
      ->setReadOnly(TRUE);

    
    $fields['name'] = BaseFieldDefinition::create('string')
      ->setLabel(t('NAME'))
      ->setDescription(t('The NAME of the Crypto Currency entity.'))
      ->setReadOnly(TRUE);

      $fields['symbol'] = BaseFieldDefinition::create('string')
      ->setLabel(t('SYMBOL'))
      ->setDescription(t('The Symbol of the Crypto Currency entity.'))
      ->setReadOnly(TRUE);

      $fields['rank'] = BaseFieldDefinition::create('integer')
      ->setLabel(t('RANK'))
      ->setDescription(t('The RANK of the Crypto Currency entity.'))
      ->setReadOnly(TRUE);

    return $fields;
  }

  
  

  }
  
