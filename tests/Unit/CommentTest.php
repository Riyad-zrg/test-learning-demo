<?php


namespace App\Tests\Unit;

use App\Entity\Comment;
use App\Entity\User;
use App\Repository\UserRepository;
use App\Tests\Support\UnitTester;

class CommentTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    public function testIsLegitComment()
    {
        //Créer deux commentaires, un valide et un invalide, vérifier que les événements attendus se produisent

        $comment = new Comment();

        $comment->setContent("Hello world !");
        $this->assertTrue($comment->isLegitComment(),"Le commentaire est valide.");

        $comment->setContent("@@@@@@@");
        $this->assertFalse($comment->isLegitComment(),"Le commentaire est invalide");
    }

    public function testPublishedAt()
    {
        //Vérifie que quand un commentaire est créé, l'attribut publishedAt est correctement initialisé

        $comment = new Comment();
        $this->assertTrue($comment->getPublishedAt() instanceof \DateTimeImmutable);

    }




}
