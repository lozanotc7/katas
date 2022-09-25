<?php

use Katas\Cart\Application\AddProductToCartFromUuids;
use Katas\Cart\Domain\CartRepository;
use Katas\Cart\Domain\ProductRepository;

/*
 * use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
 * use Symfony\Component\HttpFoundation\{
 *  JsonResponse, RedirectResponse, Request, Response
 * };
 */

class AddProduct extends AbstractController
{
    public function __construct(private ProductRepository $productRepository, private CartRepository $cartRepository)
    {
    }

    public function add(Request $request)
    {
        $data = $request->request();

        (new AddProductToCartFromUuids($this->productRepository, $this->cartRepository))(
            $data->get('product.id'),
            $data->get('cart.id')
        );

        return new JsonResponse([], 200);
    }
}
