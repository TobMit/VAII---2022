<?php

namespace App\Controllers;

use App\Core\Responses\Response;
use Message;

class ApiController extends \App\Core\AControllerBase
{

    /**
     * @inheritDoc
     */
    public function index(): Response
    {
        // TODO: Implement index() method.
        return $this->html();
    }
    public function getall() {
        $msgs = Message::getAll();
        return $this->json($msgs);
    }
}