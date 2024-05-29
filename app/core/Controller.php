<?php

class Controller
{
  public function view($name, $data = [], $session = [], $some = [])
  {
    if (!empty($data)) {
      extract($data);
    }

    if (!empty($session)) {
      extract($session);
    }

    if (!empty($some)) {
      extract($some);
    }

    if (file_exists('../app/views/' . $name . '.view.php')) {

      require '../app/views/' . $name . '.view.php';
    } else {

      require '../app/views/404.view.php';
    }
  }
}