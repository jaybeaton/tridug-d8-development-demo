<?php

namespace Drupal\tridug_weather\Form;

use Drupal\Core\Form\ConfigFormBase;
use Symfony\Component\HttpFoundation\Request;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class WeatherConfig.
 */
class WeatherConfig extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'weather_config';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'tridug_weather.settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, Request $request = NULL) {

    $config = $this->config('tridug_weather.settings');

    $form['zip_code'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Zip code'),
      '#description' => $this->t('Enter the Zip code to be used by the Weather block.'),
      '#attributes' => array(
        'placeholder' => $this->t('27312'),
      ),
      '#default_value' => $config->get('zip_code'),
    ];

    return parent::buildForm($form, $form_state);

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

    $values = $form_state->getValues();
    $this->config('tridug_weather.settings')
      ->set('zip_code', $values['zip_code'])
      ->save();
    parent::submitForm($form, $form_state);

  }

}
