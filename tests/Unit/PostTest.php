<?php


namespace App\Tests\Unit;

use App\Entity\Comment;
use App\Entity\Post;
use App\Tests\Support\UnitTester;

class PostTest extends \Codeception\Test\Unit
{

    protected UnitTester $tester;

    protected function _before()
    {
    }

    // Règle métier : Un post ne peut pas avoir de doublons dans sa collection de commentaires.
    public function testAddDuplicatedCommentInPost()
    {
        $post = new Post();
        $comment = $this->makeEmpty(Comment::class);

        $post->addComment($comment); //Le commentaire est ajouté une première fois dans le Post.
        $post->addComment($comment); //On essaye de rajouter le même commentaire une deuxième fois

        $this->assertTrue($post->getComments()->count() === 1, 'Le post ne doit pas contenir de commentaires doublons');
    }


    /*
    Évaluation des règles métiers de l'entité Post :

    2 -Le published At est correctement initialisé dans le constructeur et est bien un DateTimeImmutable
    Même si elle est vide, les collections comments et tags sont censés être crée, on veut vérifier que le constructeur
    le fait bel est bien.

    1 - tester addComment pour vérifier qu'on ne peut pas ajouter un commentaire qui existerait déja dans le post.

    1 - Vérifier également addTag de la même manière
    */
}
