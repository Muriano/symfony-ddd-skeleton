<?php

namespace App\Controller\HealthCheck;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/health-check", name="get_health_check_health_check", methods={"GET"})
 */
class HealthCheckController extends AbstractController
{
    public function __invoke(Request $request): Response
    {
        return $this->json([
            'status' => 'ok'
        ]);
    }
}
