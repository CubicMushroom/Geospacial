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

require __DIR__ . "/../../../../vendor/autoload.php";

class ConvertTest extends \PHPUnit_Framework_TestCase
{
    public function testE_N_to_Lat_Long()
    {
        $this->assertEqual(
            array(),
            Convert::E_N_to_Lat_Long();
        );
    }
}