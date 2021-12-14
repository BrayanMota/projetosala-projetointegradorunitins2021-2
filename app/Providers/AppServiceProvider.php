<?php

namespace App\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
  /**
   * Register any application services.
   *
   * @return void
   */
  public function register()
  {
    //
  }

  /**
   * Bootstrap any application services.
   *
   * @return void
   */
  public function boot()
  {
    #ex filtros={nome:'itamar'}&key=A756FCAC-79BE-47FC-A236-99D45B38BBCA&opcoes={porPagina:10000,%20paginaAtual:0,OrderBy:'CodPessoa',SortOrder:'desc'}
    Config::set('url', 'https://www.unitins.br/apirm/api/rm/');
  }
}
