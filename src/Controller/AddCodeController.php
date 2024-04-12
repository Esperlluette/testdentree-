<?php

namespace App\Controller;

use App\Entity\ErrorCode;
use App\Form\AddErrorCodeType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AddCodeController extends AbstractController
{
    public function checkBDD(array $array, String $http_code): bool
    {

        /**
         * fetch each bdd http_code to compare it to $http_code
         * if it has no match then return true, else return false
         */

        foreach ($array as $key => $value) {
            if ($value->getHttpCode() == $http_code) {
                return false;
            }
        }
        return true;
    }
    #[Route('/add-code', name: 'app_add_code')]
    public function index(Request $request, EntityManagerInterface $em): Response
    {

        $error_code = new ErrorCode();
        $form = $this->createForm(AddErrorCodeType::class, $error_code);
        $array = $em->getRepository(ErrorCode::class)->findAll();

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            if ($this->checkBDD($array, $form->getData()->getHttpCode())) {
                //following
                $this->addFlash('notice', 'Message envoyé');
                $error_code = $form->getData();
                $em->persist($error_code);
                $em->flush();
                return $this->redirectToRoute('app_add_code');
            }
        }



        return $this->render('add_code/index.html.twig', [
            'controller_name' => 'AddCodeController',
            'form' => $form->createView(),
        ]);
    }
}
