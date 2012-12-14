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

namespace CubicMushroom\Geospacial\Address;

/**
 * Defines the UK Postcode Address object class
 */
class UKPostcode extends Address
{
    public $street;
    public $postcode;
    public $country = 'United Kingdom';

    public function __construct($postcode)
    {
        if (! is_string($postcode)) {
            throw new InvalidArgumentException('Postcode must be a string');
        }

        $this->postcode = $postcode;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }
}