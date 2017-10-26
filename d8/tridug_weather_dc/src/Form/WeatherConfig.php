<?php

namespace Drupal\tridug_weather_dc\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class WeatherConfig.
 */
class WeatherConfig extends FormBase {


  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'weather_config';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['zip_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Zip code'),
      '#description' => $this->t('Enter the Zip code to be used by the Weather block.'),
      '#maxlength' => 64,
      '#size' => 64,
    ];
    $form['submit'] = [
      '#type' => 'submit',
      '#value' => $this->t('Submit'),
    ];

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    // Display result.
    foreach ($form_state->getValues() as $key => $value) {
      drupal_set_message($key . ': ' . $value);
    }

  }

}
