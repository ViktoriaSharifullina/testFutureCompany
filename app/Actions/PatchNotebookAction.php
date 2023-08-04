<?php

namespace App\Actions;

use App\Models\Notebook;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class PatchNotebookAction
{
    public function execute(int $id, array $data): array|Builder|Collection|Model
    {
        $notebook = Notebook::findOrFail($id);
        $notebook->update($data);

        return $notebook;
    }
}
