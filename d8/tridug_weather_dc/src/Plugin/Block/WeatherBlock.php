<?php

namespace Drupal\tridug_weather_dc\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'WeatherBlock' block.
 *
 * @Block(
 *  id = "weather_block",
 *  admin_label = @Translation("Weather block"),
 * )
 */
class WeatherBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    $build = [];
    $build['weather_block']['#markup'] = 'Implement WeatherBlock.';

    return $build;
  }

}
