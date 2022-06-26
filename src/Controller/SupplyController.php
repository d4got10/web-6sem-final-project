<?php

namespace App\Controller;

use App\Entity\Supply;
use App\Form\SupplyType;
use App\Repository\SupplyRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/supply")
 */
class SupplyController extends AbstractController
{
    /**
     * @Route("/", name="app_supply_index", methods={"GET"})
     */
    public function index(SupplyRepository $supplyRepository): Response
    {
        return $this->render('supply/index.html.twig', [
            'supplies' => $supplyRepository->findAll(),
        ]);
    }

    /**
     * @Route("/new", name="app_supply_new", methods={"GET", "POST"})
     */
    public function new(Request $request, SupplyRepository $supplyRepository): Response
    {
        $supply = new Supply();
        $form = $this->createForm(SupplyType::class, $supply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $supplyRepository->add($supply, true);

            return $this->redirectToRoute('app_supply_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('supply/new.html.twig', [
            'supply' => $supply,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_supply_show", methods={"GET"})
     */
    public function show(Supply $supply): Response
    {
        return $this->render('supply/show.html.twig', [
            'supply' => $supply,
        ]);
    }

    /**
     * @Route("/{id}/edit", name="app_supply_edit", methods={"GET", "POST"})
     */
    public function edit(Request $request, Supply $supply, SupplyRepository $supplyRepository): Response
    {
        $form = $this->createForm(SupplyType::class, $supply);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $supplyRepository->add($supply, true);

            return $this->redirectToRoute('app_supply_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->renderForm('supply/edit.html.twig', [
            'supply' => $supply,
            'form' => $form,
        ]);
    }

    /**
     * @Route("/{id}", name="app_supply_delete", methods={"POST"})
     */
    public function delete(Request $request, Supply $supply, SupplyRepository $supplyRepository): Response
    {
        if ($this->isCsrfTokenValid('delete'.$supply->getId(), $request->request->get('_token'))) {
            $supplyRepository->remove($supply, true);
        }

        return $this->redirectToRoute('app_supply_index', [], Response::HTTP_SEE_OTHER);
    }
}
