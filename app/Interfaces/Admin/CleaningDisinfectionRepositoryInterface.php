<?php

namespace App\Interfaces\Admin;

interface CleaningDisinfectionRepositoryInterface extends AppRepositoryInterface
{
    public function clean($id);

}
