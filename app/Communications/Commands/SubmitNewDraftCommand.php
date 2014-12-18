<?php namespace App\Communications\Commands;

class SubmitNewDraftCommand
{
    public $title;
    public $content;
    public $email;

    /**
     * @param $title
     * @param $content
     */
    public function __construct($email, $title, $content)
    {
        $this->title = $title;
        $this->content = $content;
        $this->email = $email;
    }
}