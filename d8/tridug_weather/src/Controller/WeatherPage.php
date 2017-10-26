<?php

namespace Drupal\tridug_weather\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class WeatherPage.
 */
class WeatherPage extends ControllerBase {

  /**
   * Weather Info.
   *
   * @return array
   *   Return weather information.
   */
  public function weatherInfo() {

    $build = [];

    $current_user = \Drupal::currentUser();

    if ($current_user->id()) {
      // Show user's weather.
      $content = '<h2>' . $this->t('My weather') . '</h2>';
      if (!$zip = tridug_weather_get_user_zip()) {
        $content .= '<p>'
          . $this->t('Your zip code is not set.')
          . '</p>';
      }
      else {
        $vars = [
          '#theme' => 'tridug_weather',
          '#zip' => $zip,
        ];
        $content .= \Drupal::service('renderer')->render($vars);
      }
      $build[] = [
        '#type' => 'markup',
        '#markup' => $content,
      ];
    } // Logged in?

    // Show site weather.
    $content = '<h2>' . $this->t('Site weather') . '</h2>';
    if (!$zip = \Drupal::config('tridug_weather.settings')->get('zip_code')) {
      $content .= '<p>'
        . $this->t('Zip code not set.')
        . '</p>';
      //watchdog('tridug', 'Zip code not set', array(), WATCHDOG_ERROR);
    }
    else {
      $vars = [
        '#theme' => 'tridug_weather',
        '#zip' => $zip,
      ];
      $content .= \Drupal::service('renderer')->render($vars);
    }
    $build[] = [
      '#type' => 'markup',
      '#markup' => $content,
    ];

    // Show weather for most-popular zip.
    $zip = tridug_weather_get_popular_zip();
    if ($zip) {
      $content = '<h2>'
        . t('Weather in most-popular Zip code (@zip)', array('@zip' => $zip))
        . '</h2>';
      $vars = [
        '#theme' => 'tridug_weather',
        '#zip' => $zip,
      ];
      $content .= \Drupal::service('renderer')->render($vars);
      $build[] = [
        '#type' => 'markup',
        '#markup' => $content,
      ];
    }

    return $build;

  }

}
