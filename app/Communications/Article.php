<?php namespace App\Communications;

use App\Support\Traits\Delegator;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="articles")
 */
class Article
{
    use Delegator;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /** @ORM\ManyToOne(targetEntity="App\Communications\Author", inversedBy="articles") **/
    private $author;

    /** @ORM\Column(type="string") */
    private $title;

    /** @ORM\Column(type="text") */
    private $content;

    /**
     *
     */
    public function unpublish()
    {
        $this->delegateTo('App\Communications\Draft');
    }
}