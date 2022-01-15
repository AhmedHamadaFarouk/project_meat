<?php

namespace App\Interfaces\Admin;

interface AppRepositoryInterface
{
    // Get All
    public function index();

    // Create new
    public function create();

    // Store
    public function store($request);

    // edit
    public function edit($id);

    // Show
    public function show($id);

    // update
    public function update($request);

    // destroy
    public function destroy($request);



}
