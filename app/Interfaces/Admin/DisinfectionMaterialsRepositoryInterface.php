<?php

namespace App\Interfaces\Admin;

interface DisinfectionMaterialsRepositoryInterface extends  AppRepositoryInterface
{
    public function disinfection($id);

}
