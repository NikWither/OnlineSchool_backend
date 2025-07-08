<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Note;
use App\Http\Controllers\API\V1\Admin\BaseDocumentController;

class AdminNotesController extends BaseDocumentController
{
   protected $modelClass = Note::class; 
}
