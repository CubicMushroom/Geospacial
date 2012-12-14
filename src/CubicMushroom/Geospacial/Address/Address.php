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
 * Defines the core Address object class, designed to be extended by subclasses
 */
abstract class Address
{
    public $street;
    public $postcode;
    public $country;

    protected $addressAliasses = array(
        'zip' => 'postcode',
    );

    // Use __get to return aliases for 
    public function __get($property)
    {
        if (
            empty($this->addressAliasses[$property])
            || empty($this->{$this->addressAliasses[$property]})
        ) {
            throw new RuntimeException("$property property is not accessible");
        }
    }

    abstract function __toString();
}