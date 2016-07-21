<?php
/*
 * WellCommerce Open-Source E-Commerce Platform
 * 
 * This file is part of the WellCommerce package.
 *
 * (c) Adam Piotrowski <adam@wellcommerce.org>
 * 
 * For the full copyright and license information,
 * please view the LICENSE file that was distributed with this source code.
 */

namespace WellCommerce\Bundle\LayoutBundle\Factory;

use WellCommerce\Bundle\DoctrineBundle\Factory\AbstractEntityFactory;
use WellCommerce\Bundle\LayoutBundle\Entity\LayoutBox;
use WellCommerce\Bundle\LayoutBundle\Entity\LayoutBoxInterface;

/**
 * Class LayoutBoxFactory
 *
 * @author  Adam Piotrowski <adam@wellcommerce.org>
 */
class LayoutBoxFactory extends AbstractEntityFactory
{
    public function create() : LayoutBoxInterface
    {
        $box = new LayoutBox();
        $box->setBoxType($this->getDefaultLayoutBoxType());
        $box->setIdentifier('');
        $box->setSettings([]);
        
        return $box;
    }
    
    private function getDefaultLayoutBoxType() : string
    {
        $type = $this->container->get('layout_box.configurator.collection')->first();

        return $type->getType();
    }
}
