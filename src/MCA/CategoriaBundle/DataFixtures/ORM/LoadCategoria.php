<?php

namespace MCA\CategoriaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MCA\CategoriaBundle\Entity\Categoria;

class LoadCategoriaData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $categoria = new Categoria();
        $categoria->setNome("Celulares");
        
        $categoria2 = new Categoria();
        $categoria2->setNome("Esportes");
        
        $manager->persist($categoria);
        $manager->persist($categoria2);
        $manager->flush();
    }
}