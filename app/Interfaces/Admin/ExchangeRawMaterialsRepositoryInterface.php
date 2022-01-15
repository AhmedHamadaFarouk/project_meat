<?php

namespace App\Interfaces\Admin;

interface ExchangeRawMaterialsRepositoryInterface extends  AppRepositoryInterface
{
    public function exchange($id);

}
