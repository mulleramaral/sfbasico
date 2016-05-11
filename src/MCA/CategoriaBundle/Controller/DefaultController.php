<?php

namespace MCA\CategoriaBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class DefaultController extends Controller
{
    public function indexAction()
    {
        $categorias = array(
            'Informática',
            'Roupas',
            'Sapatos',
            'Papelaria'
        );
        return $this->render('CategoriaBundle:Default:index.html.twig', array('categorias' => $categorias));
    }
    
    public function categoriasAction($nomeCategoria,$nomeProduto){
        return $this->render('CategoriaBundle:Default:Categorias.html.twig',array(
            'nomeCategoria' => $nomeCategoria,
            'nomeProduto' => $nomeProduto
        ));
    }
}
