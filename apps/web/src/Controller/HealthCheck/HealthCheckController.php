<?php

namespace App\Controller\HealthCheck;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class HealthCheckController extends AbstractController
{
    /**
     * @Route("/health-check", name="health_check_health_check")
     */
    public function index()
    {
        return $this->json([
            'status' => 'ok'
        ]);
    }
}
