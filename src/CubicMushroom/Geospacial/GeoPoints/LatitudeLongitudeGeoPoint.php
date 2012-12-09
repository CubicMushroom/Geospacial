<?php
/*
 * This file is part of the CubicMushroom/Geospacial package.
 *
 * (c) Cubic Mushroom Ltd. <support@cubicmushroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CubicMushroom\Geospacial\GeoPoints;

class LatitudeLongitudeGeoPoint extends GeoPoint
{
    public $latitude;
    public $longitude;

    public function __construct($lat, $lon)
    {
        $this->latitude = $lat;
        $this->longitude = $lon;
    }
}