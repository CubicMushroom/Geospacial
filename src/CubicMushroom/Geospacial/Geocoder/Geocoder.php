<?php
/**
 * This file is part of the CubicMushroom/Geospacial package.
 *
 * (c) Cubic Mushroom Ltd. <support@cubicmushroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package   Cubic Mushroom Geospacial
 * @author    Toby Griffiths <toby@cubicmushroom.co.uk>
 * @copyright Cubic Mushroom Ltd. 2012
 * @license   See LICENSE file provided with package
 */

namespace CubicMushroom\Geospacial\Geocoder;

use CubicMushroom\Geospacial\Address\UKPostcode;
use CubicMushroom\Geospacial\GeoPoints\LatitudeLongitudeGeoPoint;

/**
 * Class to handle geocoding of addresses to co-ordinates
 *
 * @package   Cubic Mushroom Geospacial
 * @author    Toby Griffiths <toby@cubicmushroom.co.uk>
 * @copyright Cubic Mushroom Ltd. 2012
 * @license   See LICENSE file provided with package
 */
class Geocoder
{
    /**
     * Currently does nothing!
     */
    public function __construct()
    {
        $this->entityManager = require __DIR__ . "/../../../../bootstrap_doctrine.php";
    }

    /**
     * Converts a UK postcode to Lat/Lon co-ordinates
     */
    public function UKPostcodeToLatLon(UKPostcode $postcode)
    {
        $lookup = $this->entityManager->getRepository('\CubicMushroom\Geospacial\Entity\UKPostcode')->findBy(array('postcode' => $postcode));

        if (count($lookup) == 1) {
            return new LatitudeLongitudeGeoPoint($lookup[0]->getLatitude(), $lookup[0]->getLongitude());
        }
    }
}