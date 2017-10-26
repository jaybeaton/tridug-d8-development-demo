<?php

/**
 * @file
 * Provides callbacks for pages.
 */

function tridug_weather_show_weather_page() {

  $out = '';

  if (user_is_logged_in()) {
    // Show user's weather.
    $out .= '<h2>' . t('My weather') . '</h2>';
    if (!$zip = tridug_weather_get_user_zip()) {
      $out .= '<p>'
        . t('Your zip code is not set.')
        . '</p>';
    }
    else {
      $out .= theme('tridug_weather_widget', array('zip' => $zip));
    }
  } // Logged in?

  // Show site weather.
  $out .= '<h2>' . t('Site weather') . '</h2>';
  if (!$zip = variable_get('tridug_weather_zip', NULL)) {
    $out .= '<p>'
      . t('Zip code not set.')
      . '</p>';
    watchdog('tridug', 'Zip code not set', array(), WATCHDOG_ERROR);
  }
  else {
    $out .= theme('tridug_weather_widget', array('zip' => $zip));
  }

  // Show weather for most-popular zip.
  $zip = tridug_weather_get_popular_zip();
  if ($zip) {
    $out .= '<h2>'
      . t('Weather in most-popular Zip code (@zip)', array('@zip' => $zip))
      . '</h2>'
      . theme('tridug_weather_widget', array('zip' => $zip));
  }

  return $out;

}
