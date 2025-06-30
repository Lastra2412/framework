<?php
class Rota{
    private $controlador = "Paginas";
    private $metodo = 'index';
    private $parametros = [];
    public function __construct(){
      //  echo 'criando a primeira classe';
    $url = $this->url() ? $this->url(): [0];
    if(file_exists('..app/controllers/' .ucwords($url[0]).'.php')){
        $this->controlador = ucwords($url[0]);
        unset($url[0]);
    }//fim do if que verifica se o arquivo existe
    require_once '../app/Controllers/'.$this->controlador.'.php';
    $this->controlador= new $this->controlador;
    if(isset($url[1])){
    if(method_exists($this->controlador, $url[1])){
         $this->metodo = $url[1];
        unset($url[1]);
    }//fim do if que verifica se o método existe 
    }//fim do if que verifica se a url existe
    $this->parametros = $url ? array_values($url) : [];
    call_user_func_array([$this->controlador, $this->metodo],
    $this->parametros);

        var_dump($this); 
    }//fim da função construtor

    private function url(){
        //echo 'carregando a url';
        //o filtro FILTER_SANITIZE_URL remove todos os caracters ilegais de uma URL
           $url = filter_input(INPUT_GET, 'url',FILTER_SANITIZE_URL);
           //verifica se a url existe
           if(isset($url)){

            //trim - retira espaço no ínicio e final de uma string
            //rtrim - retira espaço em branco (ou outros caracteres) do final da string
            $url = trim(rtrim($$url,'/'));

             //explode - divide uma string em strings, retorna um array
             $url = explode('/', $url);
              return $url; 
           }//fim do if
        echo $_GET['url'];
    }//fim da função url

}//fim da classe Rota 
 
