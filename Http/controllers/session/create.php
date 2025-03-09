<?php

use Core\Session;

return view('session/create.view.php', [
    'errors' => Session::get('errors'),
]);
