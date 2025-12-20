<?php


namespace App\Tests\Unit;

use App\Entity\Comment;
use App\Entity\Post;
use App\Entity\Tag;
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

        $this->assertEquals(1,$post->getComments()->count(), 'Le post ne doit pas contenir de commentaires doublons'); //On vérifie qu'un seul commentaire a été ajouté
    }

    public function testAddDuplicatedTagInPost()
    {
        $post = new Post();
        $tag = $this->makeEmpty(Tag::class);

        $post->addTag($tag); //Le tag est ajouté une première fois dans le Post.
        $post->addTag($tag); //On essaye de rajouter le même tag une deuxième fois

        $this->assertEquals(1,$post->getTags()->count(), "Le post ne doit pas contenir de tags doublons."); //On vérifie qu'un seul tag a été ajouté
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
