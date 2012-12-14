<?php
/*
 * This file is part of the CubicMushroom/PostcodeDataLoader package.
 *
 * (c) Cubic Mushroom <support@cubicmushroom.com>
 *
 * For the full copyright and license information;
 protected $ please view the LICENSE
 * file that was distributed with this source code.
 */


namespace CubicMushroom\Geospacial\Entity;

/**
 * @Entity @Table(name="postcodes",indexes={@index(name="postcode_idx", columns={"postcode"})})
 **/
class UKPostcode
{
    /**
     * @Id @Column(type="integer") @GeneratedValue
     **/
    protected $id;

    /**
     * @Column(type="string", unique=true)
     **/
    protected $postcode;

    /**
     * @Column(type="integer")
     **/
    protected $positional_quality_indicator;

    /**
     * @Column(type="integer")
     **/
    protected $eastings;

    /**
     * @Column(type="integer")
     **/
    protected $northings;

    /**
     * @Column(type="float", precision=8, scale=2)
     */
    protected $latitude;

    /**
     * @Column(type="float", precision=8, scale=2)
     */
    protected $longitude;

    public function getId()
    {
        return $this->id;
    }

    public function getPostcode()
    {
        return $this->postcode;
    }

    public function setPostcode($postcode)
    {
        $this->postcode = str_replace(' ', '', $postcode);
    }

    public function getPositional_quality_indicator()
    {
        return $this->positional_quality_indicator;
    }

    public function setPositional_quality_indicator($positional_quality_indicator)
    {
        $this->positional_quality_indicator = $positional_quality_indicator;
    }

    public function getEastings()
    {
        return $this->eastings;
    }

    public function setEastings($eastings)
    {
        $this->eastings = $eastings;
    }

    public function getNorthings()
    {
        return $this->northings;
    }

    public function setNorthings($northings)
    {
        $this->northings = $northings;
    }

    public function getLatitude()
    {
        return $this->latitude;
    }

    public function getLongitude()
    {
        return $this->longitude;
    }

    /**
     * Sets the latitude & longitude vales
     *
     * @param mixed $lat Either an object with a latitude & longitude property, or 
     *                   a latitude value (to couple with $lon value)
     * @param mixed $lon (optional) $longitude value (not required if $lat is an
     *                   object)
     *
     * @return void
     */
    public function setLatLon($lat, $lon = null)
    {
        // Do we have just a single object as a parameter
        if (is_object($lat) && empty($lon)) {
            $this->latitude = $lat->latitude;
            $this->longintude = $lat->longitude;
        } else {
            $this->latitude = $lat;
            $this->longitude = $lon;
        }
    }

}