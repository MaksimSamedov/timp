<?php

namespace App\Controller;

use App\Repository\OptionRepository;
use App\Utils\Arrays;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    private OptionRepository $optionRepository;

    public function getDefaultOptions(): array
    {
        return [
            'meta_description' => '',
            'meta_keywords' => '',
            'page_title' => 'Dentist',
            'title' => '',
            'path' => [],
            'opts' => $this->optionRepository->getAllOptions(),
        ];
    }

    /**
     * DefaultController constructor.
     * @param OptionRepository $optionRepository
     */
    public function __construct(OptionRepository $optionRepository)
    {
        $this->optionRepository = $optionRepository;
    }

    /**
     * @Route("/", name="default")
     */
    public function index(): Response
    {
        $args = Arrays::prepareArgs($this->getDefaultOptions(), []);
        return $this->render('default/index.html.twig', $args);
    }

    /**
     * @Route ("/about", name="about")
     * @return Response
     */
    public function about(): Response
    {
        $args = Arrays::prepareArgs($this->getDefaultOptions(), [
            'page_title' => 'Dentist - About',
            'title' => 'About Us',
            'path' => [
                ['name' => 'Home', 'url' => '/'],
            ],
        ]);
        return $this->render('default/about.html.twig', $args);
    }

    /**
     * @Route ("/services", name="services")
     */
    public function services(): Response
    {
        $args = Arrays::prepareArgs($this->getDefaultOptions(), [
            'page_title' => 'Dentist - Services',
            'title' => 'Services',
            'path' => [
                ['name' => 'Home', 'url' => '/'],
            ],
        ]);
        return $this->render('default/services.html.twig', $args);
    }

    /**
     * @Route ("/opening-hour", name="opening-hour")
     */
    public function opening_hour(): Response
    {
        $args = Arrays::prepareArgs($this->getDefaultOptions(), [
            'page_title' => 'Dentist - Opening hour',
            'title' => 'Opening hour',
            'path' => [
                ['name' => 'Home', 'url' => '/'],
            ],
        ]);
        return $this->render('default/opening-hour.html.twig', $args);
    }

    /**
     * @Route ("/contact", name="contact")
     */
    public function contact(): Response
    {
        $args = Arrays::prepareArgs($this->getDefaultOptions(), [
            'page_title' => 'Dentist - Contact Us',
            'title' => 'Contact Us',
            'path' => [
                ['name' => 'Home', 'url' => '/'],
            ],
        ]);
        return $this->render('default/contact.html.twig', $args);
    }
}
