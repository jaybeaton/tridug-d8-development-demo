<?php

namespace Drupal\tridug_weather\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'TriDUG weather' block.
 *
 * @Block(
 *  id = "weather_block",
 *  admin_label = @Translation("TriDUG weather"),
 * )
 */
class WeatherBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {

    $zip_code = \Drupal::config('tridug_weather.settings')->get('zip_code');

    $build = [];

    $build[] = [
      '#theme' => 'tridug_weather',
      '#zip' => $zip_code,
    ];

    return $build;
  }

}
