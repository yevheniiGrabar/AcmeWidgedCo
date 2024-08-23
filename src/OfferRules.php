<?php

namespace Yevheniigrabar\AcmeWidgedCo;

class OfferRules
{
    private $offers = [
        'R01' => ['discount' => 0.5, 'min_qty' => 2]
    ];

    public function applyOffers($basket)
    {
        $total = 0;
        $productQuantities = array_count_values($basket);

        foreach ($productQuantities as $code => $quantity) {
            $product = (new ProductCatalogue())->getProduct($code);
            if ($product) {
                $price = $product['price'];
                $offer = $this->offers[$code] ?? null;
                if ($offer && $quantity >= $offer['min_qty']) {
                    $total += $price * $offer['discount'] * (int)($quantity / 2);
                    $total += $price * ($quantity % 2);
                } else {
                    $total += $price * $quantity;
                }
            }
        }

        return $total;
    }
}