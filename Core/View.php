<?php

/**

  TODO:
  - many comments
  - twig
  - probably a lot more

 */

namespace Core;

/**
* base view
*/
class View
{
  /**
   * 
   * Render a view
   *
   * @param string $view - The View File
   *
   * @return void
   */

  public static function render($view, $args = []) {
    extract($args, EXTR_SKIP);

    $file = "../App/Views/$view";

    if (is_readable($file)) {
      require $file;
    } else {
        echo "$file not found";
    }
  }

  public function renderTemplate($template, $args = []) {
    static $twig = null;

    if ($twig === null) {
      $loader = new \Twig_Loader_Filesystem('../App/Views');
      $twig = new \Twig_Environment($loader);
    }

    echo $twig->render($template, $args);
  }
  
}