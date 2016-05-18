<?php

namespace MCA\CategoriaBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use MCA\CategoriaBundle\Entity\Produto;
use MCA\CategoriaBundle\Form\ProdutoType;

/**
 * Produto controller.
 *
 */
class ProdutoController extends Controller
{
    /**
     * Lists all Produto entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $produtos = $em->getRepository('CategoriaBundle:Produto')->findAll();

        return $this->render('produto/index.html.twig', array(
            'produtos' => $produtos,
        ));
    }

    /**
     * Creates a new Produto entity.
     *
     */
    public function newAction(Request $request)
    {
        $produto = new Produto();
        $form = $this->createForm(new ProdutoType(), $produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            return $this->redirectToRoute('produto_show', array('id' => $produto->getId()));
        }

        return $this->render('produto/new.html.twig', array(
            'produto' => $produto,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Produto entity.
     *
     */
    public function showAction(Produto $produto)
    {
        $deleteForm = $this->createDeleteForm($produto);

        return $this->render('produto/show.html.twig', array(
            'produto' => $produto,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing Produto entity.
     *
     */
    public function editAction(Request $request, Produto $produto)
    {
        $deleteForm = $this->createDeleteForm($produto);
        $editForm = $this->createForm(new ProdutoType(), $produto);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($produto);
            $em->flush();

            return $this->redirectToRoute('produto_edit', array('id' => $produto->getId()));
        }

        return $this->render('produto/edit.html.twig', array(
            'produto' => $produto,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a Produto entity.
     *
     */
    public function deleteAction(Request $request, Produto $produto)
    {
        $form = $this->createDeleteForm($produto);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($produto);
            $em->flush();
        }

        return $this->redirectToRoute('produto_index');
    }

    /**
     * Creates a form to delete a Produto entity.
     *
     * @param Produto $produto The Produto entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Produto $produto)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('produto_delete', array('id' => $produto->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
