<?php

namespace App\Services;

use Illuminate\Support\Facades\Config;

class ApiService
{
  private $filtro;
  private $key = 'A756FCAC-79BE-47FC-A236-99D45B38BBCA';
  private $route;

  public function __construct($route, array $opcoes, array $filtro = null)
  {
    $this->route = $route;
    $this->opcoes = $opcoes;
    $this->filtro = $filtro;
  }

  public function __invoke()
  {
    $data = [
      'filtros' => (fn() => $this->filtro ? json_encode($this->filtro) : null)(),
      'opcoes' => json_encode($this->opcoes),
      'key' => $this->key,
    ];
    $query = http_build_query($data);
    $url = Config::get('url') . $this->route;
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url . '?' . $query);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      "Content-Type: application/json",

    ]);
    return json_decode(curl_exec($ch));

  }
}
