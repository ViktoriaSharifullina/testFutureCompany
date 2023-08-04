<?php

namespace App\Actions;

use App\Models\Notebook;

class CreateNotebookAction
{
    public function execute(array $fields): Notebook
    {
        return Notebook::create($fields);
    }
}
