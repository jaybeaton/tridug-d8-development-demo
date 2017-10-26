<?php

/**
 * @file
 * Template file for weather widget.
 *
 * Available variables:
 * - $zip: The zip code.
 */
?>
<p>
  <span style="display: block !important; width: 180px; text-align: center; font-family: sans-serif; font-size: 12px;">
    <a href="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=zmw:<?php print $zip; ?>.1.99999&amp;bannertypeclick=wu_macwhite" title="Weather Forecast" target="_blank">
        <img src="http://weathersticker.wunderground.com/weathersticker/cgi-bin/banner/ban/wxBanner?bannertype=wu_macwhite&amp;zip=<?php print $zip; ?>&amp;language=EN" alt="Find more about the Weather here" width="160" /></a>
      <br /><a href="http://www.wunderground.com/cgi-bin/findweather/getForecast?query=zmw:<?php print $zip; ?>.1.99999&amp;bannertypeclick=wu_macwhite" title="Get latest Weather Forecast updates" style="font-family: sans-serif; font-size: 12px" target="_blank">Click for weather forecast</a>
  </span>
</p>
