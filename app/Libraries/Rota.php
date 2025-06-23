<?php
class Rota{
    private $controlador = "Paginas";
    public function__construct(){
      //  echo 'criando a primeira classe';
        $this->url();
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

