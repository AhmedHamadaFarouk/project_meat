<?php

namespace App\Interfaces\Admin;

interface ProductRepositoryInterface extends AppRepositoryInterface
{
    public function product($id);

}
