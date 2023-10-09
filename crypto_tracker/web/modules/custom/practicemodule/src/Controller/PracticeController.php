<?php 

namespace Drupal\practice\Controller;

use Drupal\Core\Controller\ControllerBase;

class PracticeController extends ControllerBase {

public function buildPage() {
    $build = [];

    $build['element1'] = [
        '#markup' => t('Poruka 1'),
    ];

    $build['element2'] = [
        '#type' => 'item',
        '#markup' => t('Poruka 2'),

    ];

    $build['hello'] = [
        '#type' => 'html_tag',
        '#tag' => 'p',
        '#value' => $this->t('Poruka 3'),
      ];

      $build['hello']['element1'] = [   // ovde si nestovao element1 u hello parenta,koji je iznad
        '#type' => 'html_tag',
        '#tag' => 'span',
        '#markup' => t('aaaaaaaaaa'),
    ];

    
      $build['multiarray'] = [ 
        '#type' => 'container',
    ];
    $build['multiarray']['element1'] = [
        '#markup' => t('Pokazi poruku xx'),
    ];

    $build['tabela'] = [                                                              // tabela
        '#theme' => 'table',
        '#caption' => 'TABELA',
        '#attributes' => ['class' => 'my-table-class'],
        '#header' => [
          '#attributes' => ['class' => 'my-header-class'],
          ['data' => 'Cell Value'], /* Cell */
          ['data' => 'Cell Value', '#attributes' => ['class' => 'text-align-right']], /* Cell aligned right */
          ['data' => 'Cell Value'], /* Cell */
        ],
        '#rows' => [
          'data' => [ /* Row */
            '#attributes' => ['class' => 'my-row-class'],
            [ 'data' => 'Cell Value'], /* Cell */
            [ 'data' => 'Cell Value', '#attributes' => ['class' => 'text-align-right']], /* Cell aligned right */
            [ 'data' => 'Cell Value'], /* Cell */
          ],
          
        ],
      ];

    $build['#cache'] = [        // ovo stavis na kraj svakog arraya i ne moras da radis cache rebuild
          'max-age' => 0,
      ];

      return $build;
  }

}
