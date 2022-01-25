<?php

namespace App\Interfaces\Admin;

interface ExaminationReceiptRepositoryInterface extends  AppRepositoryInterface
{

    public function print($id);

    public function details($id);

}
