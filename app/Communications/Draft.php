<?php namespace App\Communications;

use App\Support\Traits\Delegator;
use Doctrine\ORM\Mapping AS ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="drafts")
 */
class Draft
{
    use Delegator;

    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="UUID")
     * @ORM\Column(type="guid")
     */
    private $id;

    /** @ORM\ManyToOne(targetEntity="App\Communications\Author", inversedBy="drafts") **/
    private $author;

    /** @ORM\Column(type="string") */
    private $title;

    /** @ORM\Column(type="text") */
    private $content;

    /**
     *
     */
    public function publish()
    {
        $this->delegateTo('App\Communications\Article');
    }

    /**
     * @param Author $author
     * @param $title
     * @param $content
     * @return static
     */
    public static function write(Author $author, $title, $content)
    {
        $draft = new static();
        $draft->setAuthor($author);
        $draft->setTitle($title);
        $draft->setContent($content);

        return $draft;
    }

    /**
     * @param $author
     */
    private function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @param $title
     */
    private function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @param $content
     */
    private function setContent($content)
    {
        $this->content = $content;
    }
}