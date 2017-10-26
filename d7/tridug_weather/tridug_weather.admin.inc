<?php

/**
 * @file
 * Provides admin configuration form.
 */

/**
 * Form callback for configuration.
 *
 * @param $form
 * @param $form_state
 *
 * @return mixed
 */
function tridug_weather_configuration_form($form, &$form_state) {
  $form['tridug_weather_zip'] = array(
    '#type' => 'textfield',
    '#title' => t('Zip code'),
    '#description' => t('Enter the Zip code to be used by the Weather block.'),
    '#attributes' => array(
      'placeholder' => t('27312'),
    ),
    '#default_value' => variable_get('tridug_weather_zip', NULL),
  );
  return system_settings_form($form);
}
