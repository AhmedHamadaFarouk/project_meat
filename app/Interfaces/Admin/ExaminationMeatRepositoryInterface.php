<?php

namespace App\Interfaces\Admin;

interface ExaminationMeatRepositoryInterface extends  AppRepositoryInterface
{

    public function print($id);

    public function details($id);




}
