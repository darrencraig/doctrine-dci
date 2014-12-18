<?php namespace App\Http\Controllers;

use App\Communications\Commands\SubmitNewDraftCommand;

class DraftsController extends Controller
{

    public function store()
    {
        $this->execute(SubmitNewDraftCommand::class);
    }

}
