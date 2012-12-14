<?php
/*
 * This file is part of the CubicMushroom/Geospacial package.
 *
 * (c) Cubic Mushroom Ltd. <support@cubicmushroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace CubicMushroom\Geospacial;

use CubicMushroom\Geospacial\GeoPoints;
use Geograph\ConversionLatLong;

// var_export(realpath(__DIR__ . "/../../../../")); exit;

require __DIR__ . "/../../../../vendor/autoload.php";

class ConvertTest extends \PHPUnit_Framework_TestCase
{
    protected $acceptableDelta = 0.0002;

    public function testNewENToLatLonConverter()
    {
        $converter = new ConversionLatLong();
        $latLon = osgb36_to_wgs84('442124', '313080');
        $this->assertEquals(array(52.71376507, -1.37787778), $latLon);
    }

    /**
     * Test conversion from Easting/Northing to Lat/Lon
     */
    public function testENToLatLong()
    {
        // Postcodes to test
        $points = array(
            // LE67 2GN
            array(
                'EN'     => new GeoPoints\EastingNorthingGeoPoint(
                    '442124', '313080'
                ),
                'LatLgn' => new GeoPoints\LatitudeLongitudeGeoPoint(
                    52.71376507, -1.37787778
                ),
            ),
            // BD17 5BS
            array(
                'EN'     => new GeoPoints\EastingNorthingGeoPoint(
                    '414611', '439168'
                ),
                'LatLgn' => new GeoPoints\LatitudeLongitudeGeoPoint(
                    53.84856175, -1.77939768
                ),
            ),
            // TS5 6QD
            array(
                'EN'     => new GeoPoints\EastingNorthingGeoPoint(
                    '449570', '518367'
                ),
                'LatLgn' => new GeoPoints\LatitudeLongitudeGeoPoint(
                    54.55813452, -1.23503119
                ),
            ),
            // ST1 2AE
            array(
                'EN'     => new GeoPoints\EastingNorthingGeoPoint(
                    '388977', '347659'
                ),
                'LatLgn' => new GeoPoints\LatitudeLongitudeGeoPoint(
                    53.02612209, -2.16579512
                ),
            ),
            // RH6 0AN
            array(
                'EN'     => new GeoPoints\EastingNorthingGeoPoint(
                    '526928', '142262'
                ),
                'LatLgn' => new GeoPoints\LatitudeLongitudeGeoPoint(
                    51.16552667, -0.18599962
                ),
            ),
            // NN18 9NE
            array(
                'EN'     => new GeoPoints\EastingNorthingGeoPoint(
                    '487900', '287700'
                ),
                'LatLgn' => new GeoPoints\LatitudeLongitudeGeoPoint(
                    52.48017216, -0.70713366
                ),
            )
        );
        foreach ($points as $pointSet) {
            $llPoint = Convert::ENToLatLong($pointSet['EN']);
            $this->assertEquals(
                $pointSet['LatLgn']->getLatitude(),
                $llPoint->getLatitude(),
                "Converted point's latitude value is not correct",
                $this->acceptableDelta
            );
            $this->assertEquals(
                $pointSet['LatLgn']->getLongitude(),
                $llPoint->getLongitude(),
                "Converted point's longitude value is not correct",
                $this->acceptableDelta
            );
        }
    }
}