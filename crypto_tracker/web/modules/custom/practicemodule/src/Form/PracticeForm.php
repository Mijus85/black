<?php

namespace Drupal\practice\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class PracticeForm extends FormBase {

 /**
  * {@inheritdoc}
  */
  public function getFormId() {
    return 'practice_form';
 }//
 /**
  * {@inheritdoc}
  */
  public function buildForm(array $form, FormStateInterface $form_state) {
 /*  $node = \Drupal::routeMatch()->getParameter('node'); */  //ovo otkomentarisi ako ti bude trebalo,sa ovim se trazi node value i vraca pun entity

  $form['practice'] = [                                                  // build forme
    '#type' => 'textfield',
    '#title' => t('Moja forma'),
    '#size' => 25,
    '#description' => t("unesi tekst"),
    '#required' => TRUE,
  ];

  $form['submit'] = [                                   //submit dugme
    '#type' => 'submit',
    '#value' => t('PRITISNI DUGME'),
  ];

  $form['nid'] = [                                                  // hidden field,ovo se koristi zbog get parameter
    '#type' => 'hidden',
    '#value' => $nid,
  ];

  return $form;              // obavezno

    }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {

    $submitted_message = $form_state->getValue('practice');
    $this->messenger()->addMessage(t("FORMA RADI"));

  }

}


