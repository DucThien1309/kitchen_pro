<?php
class DauBepController
{
    public function index(): void
    {
        require_once "model/DauBep.php";
        $arr = (new DauBep())->all();
        require_once "view/daubep/index.php";
    }

    public function create(): void
    {
    }

    public function store(): void
    {
    }

    public function edit(): void
    {
    }

    public function update(): void
    {
    }

    public function delete(): void
    {
    }
}
