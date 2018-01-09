<?php

namespace Drupal\alert_button\Form;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\AlertCommand;
use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * {@inheritdoc}
 */
class AlertButton extends FormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'alert_button';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {

    $form['alert_button'] = [
      '#type' => 'button',
      '#value' => 'Alert',
      '#ajax' => [
        'callback' => '::alertCallback',
        'event' => 'click',
      ],
    ];
    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
  }

  /**
   * {@inheritdoc}
   */
  public function alertCallback($form, $form_state) {

    $response = new AjaxResponse();
    $response->addCommand(new AlertCommand("Welcome to Drupal! Hello Open-Source."));
    return $response;
  }

}
