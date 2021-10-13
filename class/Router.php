<?php

namespace App;

class Router {

  private $path;

  private $router;

  public function __construct (string $path)
  {
    $this->path = $path;
    $this->router = new \AltoRouter();
  }

  public function setBasePath(string $path = ''): self
  {
    $this->router->setBasePath($path);
    return $this;
  }

  public function get(string $url, string $view, ?string $name = null): self
  {
    $this->router->map('GET', $url, $view, $name);
    return $this;
  }

  public function post(string $url, string $view, ?string $name = null): self
  {
    $this->router->map('POST', $url, $view, $name);
    return $this;
  }

  public function getPost(string $url, string $view, ?string $name = null): self
  {
    $this->router->map('GET|POST', $url, $view, $name);
    return $this;
  }

  public function match()
  {
    $match = $this->router->match();
    $router = $this;
    if(is_array($match)){
      if(is_callable($match['target'])){
        call_user_func_array($match['target'], $match['params']);
      }else{
        $params = $match['params'];
        ob_start();
        require $this->path . DIRECTORY_SEPARATOR . $match['target'] . '.php';
      }
      $content = ob_get_clean();
      require $this->path . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "default.php";
    }
    return $match;
  }

  public function addRoutes($routes)
  {
    $this->router->addRoutes($routes);
  }

  public function run(): self
  {
  //  $match = $this->match();
    $router = $this;
  //  ob_start();
  //  require $this->path . DIRECTORY_SEPARATOR . $match['target'] . '.php';
  //  $content = ob_get_clean();
  //  require $this->path . DIRECTORY_SEPARATOR . "layout" . DIRECTORY_SEPARATOR . "default.php";
    return $router;
  }

  public function changeContent(string $url)
  {
    $router = $this;
    ob_start();
    require $this->path . DIRECTORY_SEPARATOR . $url . '.php';
    $content = ob_get_clean();
  }

  public function generate(string $url, ?array $params = []): string {
    if($params === []){
      return $this->router->generate($url);
    }else{
      return $this->router->generate($url, $params);
    }
  }

}
