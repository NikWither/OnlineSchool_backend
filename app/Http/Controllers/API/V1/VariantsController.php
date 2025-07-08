<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Variant;
use App\Http\Controllers\API\V1\BaseDocumentsUsersController;

class VariantsController extends BaseDocumentsUsersController
{
    protected $modelClass = Variant::class; 
}
