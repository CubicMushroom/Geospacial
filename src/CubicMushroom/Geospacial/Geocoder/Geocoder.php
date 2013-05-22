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
use CubicMushroom\Geospacial\Exception\NoResultsException;
use CubicMushroom\Geospacial\Exception\TooManyResultsException;
use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

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
     * Sets up the Doctrine Entity Manager
     * @param array   $dbParams  Database connection parameters
     * @param boolean $isDevMode If $devMode is true always use an ArrayCache and set
     *                           setAutoGenerateProxyClasses(true).
     *                           If $devMode is false, check for Caches in the order
     *                           APC, Xcache, Memcache (127.0.0.1:11211) unless $cache
     *                           is passed as fourth argument.
     */
    public function __construct( $dbParams, $isDevMode = true )
    {
        $paths = array(__DIR__ . "/src/CubicMushroom/PostcodeDataLoader/Entity");
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);

        $this->entityManager = $entityManager = EntityManager::create($dbParams, $config);
    }

    /**
     * Converts a UK postcode to Lat/Lon co-ordinates
     */
    public function UKPostcodeToLatLon(UKPostcode $postcode)
    {
        $lookup = $this->entityManager->getRepository(
            '\CubicMushroom\Geospacial\Entity\UKPostcode'
        )->findBy(array('postcode' => $postcode->getPostcode()));

        if (empty($lookup)) {
            throw new NoResultsException('No postcodes found that match ' . $postcode->getPostcode());
        } elseif (count($lookup) > 1) {
            throw new TooManyResultsException('More than 1 result found');
        } else {
            return new LatitudeLongitudeGeoPoint($lookup[0]->getLatitude(), $lookup[0]->getLongitude());
        }
    }
}