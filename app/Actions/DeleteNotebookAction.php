<?php

namespace App\Actions;

use App\Models\Notebook;

class DeleteNotebookAction
{
    public function execute(int $id): Notebook
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->delete();

        return $notebook;
    }
}
