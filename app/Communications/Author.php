<?php namespace App\Communications;

use App\Accounts\User;
use App\Support\Traits\Delegator;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="authors")
 */
class Author
{
    use Delegator;

    /**
     * @ORM\Id
     * @ORM\Column(type="guid")
     */
    private $id;

    /**
     * @ORM\OneToMany(targetEntity="App\Communications\Article", mappedBy="author")
     */
    private $articles;

    /**
     * @ORM\OneToMany(targetEntity="App\Communications\Draft", mappedBy="author")
     */
    private $drafts;


    public function __construct()
    {
        $this->articles = new ArrayCollection();
        $this->drafts = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function identity()
    {
        return $this->id;
    }

    public function publishArticle(Draft $draft)
    {
        return 'foo';
    }

    public function unpublishArticle(Article $article)
    {
        return 'bar';
    }

}