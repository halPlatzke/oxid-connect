<?php

namespace Makaira\Connect\Modifier\Product;

use Makaira\Connect\Modifier;
use Makaira\Connect\Type;
use Makaira\Connect\Type\Common\BaseProduct;

class TrackingModifier extends Modifier
{
    /** @var  \AbstractOxSearchTracking */
    private $tracking;

    /**
     * TrackingModifier constructor.
     *
     * @param \AbstractOxSearchTracking $tracking
     */
    public function __construct(\AbstractOxSearchTracking $tracking = null)
    {
        $this->tracking = $tracking;
    }

    /**
     * Modify product and return modified product
     *
     * @param BaseProduct $product
     *
     * @return BaseProduct
     */
    public function apply(Type $product)
    {
        if (!$this->tracking) {
            return $product;
        }

        $product->TRACKING                  = $this->tracking->get('product', $product->id);
        $product->OXRATINGCNT               = (int) $product->TRACKING['rated'];
        $product->MARM_OXSEARCH_BASKETCOUNT = (int) $product->TRACKING['basketed'];
        $product->MARM_OXSEARCH_REQCOUNT    = (int) $product->TRACKING['requested'];
        $product->OXSOLDAMOUNT              = (int) $product->TRACKING['sold'];

        return $product;
    }
}
