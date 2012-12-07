<?php
/*
 * This file is part of the CubicMushroom/Geospacial package.
 *
 * (c) Cubic Mushroom Ltd. <support@cubicmushroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CubicMushroom\Geospacial\Points;

use CubicMushroom\Geospacial\Convert;

class GeoPoint
{
    /**
     * Original point object
     *
     * Can be any type of point object that extends this class
     */
    protected $origin;

    public function __construct($origin)
    {
        if (!
            $origin instanceof LatitudeLongitudeGeoPoint
            && $origin instanceof EastingNorthingGeoPoint
        ) {
            throw new InvalidArgumentException(
                '$origin is not a valid GeoPoint object'
            );
        }

        $this->origin = $origin;
    }

    public function asLatLon()
    {
        $originClass = get_class($this->origin);
        switch($originClass) {
        case "EastingNorthingGeoPoint":
            list($lat, $lng) = Convert::E_N_to_Lat_Long(
                $this->origin->Easting, $this->origin->Northing
            );

            return new LatitudeLongitudeGeoPoint($lat, $lng);
        default:
            thrown new InvalidArgumentException(
                'Convertion for '$originClass' type not defined'
            );
        }
    }
}