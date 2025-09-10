<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class HomecontrollerController extends AbstractController
{
    #[Route('/', name: 'app_homecontroller')]
    public function index(ProductRepository $productRepository): Response
    {
        $products = $productRepository->findAll();


        return $this->render('homecontroller/index.html.twig', [
            'products' => $products,
        ]);
    }
}
