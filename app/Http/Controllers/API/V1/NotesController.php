<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\Note;
use App\Http\Controllers\API\V1\BaseDocumentsUsersController;

class NotesController extends BaseDocumentsUsersController
{
    protected $modelClass = Note::class; 
}
