<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
<<<<<<< HEAD
=======
use Illuminate\Foundation\Bus\DispatchesJobs;
>>>>>>> 0c87cc8 (mentor2)
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
<<<<<<< HEAD
    use AuthorizesRequests, ValidatesRequests;
=======
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
>>>>>>> 0c87cc8 (mentor2)
}
