<?php

namespace Drupal\tridug_weather_dc\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Class WeatherPage.
 */
class WeatherPage extends ControllerBase {

  /**
   * Weatherinfo.
   *
   * @return string
   *   Return Hello string.
   */
  public function weatherInfo() {
    return [
      '#type' => 'markup',
      '#markup' => $this->t('Implement method: weatherInfo')
    ];
  }

}
