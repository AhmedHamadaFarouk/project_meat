<?php

namespace App\Interfaces\Admin;

interface WasteLogRepositoryInterface extends  AppRepositoryInterface
{
    public function waste($id);
}
