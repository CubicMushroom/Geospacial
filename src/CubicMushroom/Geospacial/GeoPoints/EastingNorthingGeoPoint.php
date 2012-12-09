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

class EastingNorthingGeoPoint extends GeoPoint
{
    public $easting;
    public $northing;

    /**
     * Breaks the 
     */
    public function __construct($easting, $northing)
    {
        $this->easting = $easting;
        $this->northing = $northing;
    }
}