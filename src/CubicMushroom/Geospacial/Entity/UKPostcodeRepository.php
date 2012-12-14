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

namespace CubicMushroom\Geospacial\Entity;

use Doctrine\ORM\EntityRepository;

class UKPostcodeRepository extends EntityRepository
{
    public function findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
    {
        // Strip spaces out of psotcode before searching
        if (! empty($criteria['postcode'])) {
            $criteria['postcode'] = str_replace(" ", "", $criteria['postcode']);
        }
        return parent::findBy($criteria, $orderBy, $limit, $offset);
    }
}