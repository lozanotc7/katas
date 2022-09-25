<?php

use Katas\Cart\Application\AddProductToCart;
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
    public function __construct(private CartRepository $cartRepository, private ProductRepository $productRepository)
    {
    }

    public function add(Request $request)
    {
        $useCase = new AddProductToCart($this->cartRepository);

        $data = $request->request();

        $product = $this->productRepository->find($data->get('product.id'));
        $cart    = $this->cartRepository->find($data->get('product.id'));

        $useCase($product, $cart);

        return new JsonResponse([], 200);
    }
}
