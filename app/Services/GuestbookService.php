<?php

namespace App\Services;

use App\Models\Guestbook;

class GuestbookService
{
    protected $guestbook;
    public function __construct(Guestbook $guestbook)
    {
        $this->guestbook = $guestbook;
    }

    public function store($data)
    {
        $model = $this->guestbook->create($data);
        return $model;
    }
}
