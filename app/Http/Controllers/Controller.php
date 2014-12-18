<?php namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Laracasts\Commander\CommanderTrait;

abstract class Controller extends BaseController {

	use ValidatesRequests, CommanderTrait;

}
