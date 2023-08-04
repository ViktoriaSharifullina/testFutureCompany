<?php

namespace App\Http\Controllers;

use App\Actions\CreateNotebookAction;
use App\Actions\DeleteNotebookAction;
use App\Actions\PatchNotebookAction;
use App\Http\Requests\CreateNotebookRequest;
use App\Http\Requests\PatchNotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

class NotebookController extends Controller
{
    public function index(): LengthAwarePaginator
    {
        return Notebook::paginate(5);
    }

    public function post(CreateNotebookRequest $request, CreateNotebookAction $action): NotebookResource
    {
        $notebook = $action->execute($request->validated());

        return new NotebookResource($notebook);
    }

    public function get(int $id)
    {

        return Notebook::findOrFail($id);
    }

    public function patch(int $id, PatchNotebookRequest $request, PatchNotebookAction $action): NotebookResource
    {
        $notebook = $action->execute($id, $request->validated());

        return new NotebookResource($notebook);
    }

    public function delete(int $id, DeleteNotebookAction $action): NotebookResource
    {
        $notebook = $action->execute($id);

        return new NotebookResource($notebook);
    }
}
