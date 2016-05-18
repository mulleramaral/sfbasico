<?php

namespace MCA\CategoriaBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use MCA\CategoriaBundle\Entity\Produto;

class LoadProdutoData implements FixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $produto = new Produto();
        $produto->setNome("caneta");
        $produto->setUnidade("PC");
        
        $produto2 = new Produto();
        $produto2->setNome("Honda");
        $produto2->setUnidade("LT");
        
        $manager->persist($produto);
        $manager->persist($produto2);
        $manager->flush();
    }
}