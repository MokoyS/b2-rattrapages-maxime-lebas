<?php

namespace App\Controller;

use App\Repository\RestaurantRepository;
use App\Repository\EmployeeRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(RestaurantRepository $restaurantRepo, EmployeeRepository $employeeRepo): Response
    {
        $restaurants = $restaurantRepo->findAll();
        $employees = $employeeRepo->findAll();
        
        return $this->render('home/index.html.twig', [
            'restaurants' => $restaurants,
            'employees' => $employees,
            'restaurant_count' => count($restaurants),
            'employee_count' => count($employees),
        ]);
    }
}