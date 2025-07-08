<?php

namespace App\Http\Controllers\API\V1\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use Illuminate\Http\Request;

class AdminTasksController extends BaseDocumentController
{
    protected $modelClass = Task::class; 
}
