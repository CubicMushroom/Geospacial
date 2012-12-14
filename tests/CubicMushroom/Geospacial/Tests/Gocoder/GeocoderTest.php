<?php
/**
 * This file is part of the CubicMushroom/Geospacial package.
 *
 * (c) Cubic Mushroom Ltd. <support@cubicmushroom.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 *
 * @package    Cubic Mushroom Geospacial
 * @subpackage Tests
 * @author     Toby Griffiths <toby@cubicmushroom.co.uk>
 * @copyright  Cubic Mushroom Ltd. 2012
 * @license    See LICENSE file provided with package
 */

namespace CubicMushroom\Geospacial\Geocoder;

use CubicMushroom\Geospacial\Address\UKPostcode;
use CubicMushroom\Geospacial\GeoPoints\LatitudeLongitudeGeoPoint;

require __DIR__ . "/../../../../../vendor/autoload.php";

/**
 * Test class for the Geocoder class methods
 */
class ConvertTest extends \PHPUnit_Framework_TestCase
{

    /**
     * 
     */
    public function setUp()
    {
        $this->geocoder = new Geocoder();
    }

    /**
     * Straight test of the UKPostcodeToLatLon conversion
     */
    public function testUKPostcodeToLatLon()
    {

        $data = array(
            array(
                'postcode' => new UKPostcode('AB101AA'),
                'expected' => new LatitudeLongitudeGeoPoint('57.148', '-2.095'),
            ),
            array(
                'postcode' => new UKPostcode('AL37JX'),
                'expected' => new LatitudeLongitudeGeoPoint('51.799', '-0.392'),
            ),
            array(
                'postcode' => new UKPostcode('EX172AH'),
                'expected' => new LatitudeLongitudeGeoPoint('50.789', '-3.650'),
            ),
        );

        foreach ($data as $toTest) {
            $latLon = $this->geocoder->UKPostcodeToLatLon($toTest['postcode']);
            $this->assertEquals(
                $toTest['expected']->getLatitude(),
                $latLon->getLatitude(),
                'Latitude does not match expected result',
                0.002
            );
            $this->assertEquals(
                $toTest['expected']->getLongitude(),
                $latLon->getLongitude(),
                'Longitude does not match expected result',
                0.002
            );
        }
    }

    /**
     * Test case insensitivity of the UKPostcodeToLatLon conversion
     */
    public function testCaseInsensitivityOfUKPostcodeToLatLon()
    {
        $data = array(
            array(
                'postcode' => new UKPostcode('ex172bt'),
                'expected' => new LatitudeLongitudeGeoPoint('50.790', '-3.655'),
            ),
            array(
                'postcode' => new UKPostcode('kt108qd'),
                'expected' => new LatitudeLongitudeGeoPoint('51.370', '-0.373'),
            ),
            array(
                'postcode' => new UKPostcode('m145gu'),
                'expected' => new LatitudeLongitudeGeoPoint('53.457', '-2.205'),
            ),
        );

        foreach ($data as $toTest) {
            $latLon = $this->geocoder->UKPostcodeToLatLon($toTest['postcode']);
            $this->assertEquals(
                $toTest['expected']->getLatitude(),
                $latLon->getLatitude(),
                'Latitude does not match expected result',
                0.002
            );
            $this->assertEquals(
                $toTest['expected']->getLongitude(),
                $latLon->getLongitude(),
                'Longitude does not match expected result',
                0.002
            );
        }
    }

    /**
     * Test case postcodes with spaces with the UKPostcodeToLatLon conversion
     */
    public function testUKPostcodeToLatLonWithPostcodesWithSpacesIn()
    {
        $data = array(
            array(
                'postcode' => new UKPostcode('EX17 2BT'),
                'expected' => new LatitudeLongitudeGeoPoint('50.790', '-3.655'),
            ),
            array(
                'postcode' => new UKPostcode('KT10 8QD'),
                'expected' => new LatitudeLongitudeGeoPoint('51.370', '-0.373'),
            ),
            array(
                'postcode' => new UKPostcode('M14 5GU'),
                'expected' => new LatitudeLongitudeGeoPoint('53.457', '-2.205'),
            ),
        );

        foreach ($data as $toTest) {
            $latLon = $this->geocoder->UKPostcodeToLatLon($toTest['postcode']);
            $this->assertEquals(
                $toTest['expected']->getLatitude(),
                $latLon->getLatitude(),
                'Latitude does not match expected result',
                0.002
            );
            $this->assertEquals(
                $toTest['expected']->getLongitude(),
                $latLon->getLongitude(),
                'Longitude does not match expected result',
                0.002
            );
        }
    }
}