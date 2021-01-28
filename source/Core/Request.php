<?php
namespace BBCurl\Core;

/**
 * Class Request - BB_CURL System.
 * @package Source\Core
 */
class Request{

    /**
     * @var false|resource - Atributo para guardar a chamada CURL.
     */
    private $curl;

    /**
     * @var string  - Atributo que contem a url da chamada.
     */
    private $uri;

    /**
     * @var array - Atributo que contem as informações obtidas pelo CURL.
     */
    private $data;

    private $headers;

    private $errors;

    /**
     * Request constructor.
     * @param string $uri - Parametro de URL para ser buscada pelo CURL.
     * @param array $headers - Parametro para adicionar HEADERS extras durante a chamada.
     */
    public function __construct(string $uri)
    {
        $this->uri = $uri;
        $this->curl = curl_init($this->uri);
        curl_setopt($this->curl, CURLOPT_TIMEOUT, 10);
        curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, 10);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_BINARYTRANSFER, true);

    }

    public function withJson()
    {
        $this->headers[] = 'Content-Type: application/json';
        return $this;
    }

    public function setHeader(string $key, string $value)
    {
        $this->headers[] = $key . ": " . $value;
        return $this;
    }

    public function setJsonHeader(string $key, array $values)
    {
        $payload = json_encode($values);
        $this->headers[] = $key . ": " . $payload;
        return $this;
    }

    /**
     * Método responsável por criar uma chamada do tipo POST.
     * @param array $data - Dadas de FORM que serão buscado ou chamados pelo post.
     * @return $this
     * @throws \Exception
     */
    public function post(array $data=[])
    {
        if(!empty($data)){
            $data_string = json_encode($data);
            curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data_string);
        }
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "POST");
        return $this;
    }

    /**
     * Método responsável por criar uma chamada do tipo PUT.
     * @param array $data - Dadas de FORM que serão buscado ou chamados pelo post.
     * @return $this
     * @throws \Exception
     */
    public function put(array $data)
    {

        if(empty($data)){
            throw  new \Exception("Dados em branco");
            exit;
        }
        $data_string = json_encode($data);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data_string);
        return $this;
    }

    /**
     * Método responsável por criar uma chamada do tipo DELETE.
     * @return $this
     */
    public function delete()
    {
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "DELETE");
        return $this;
    }


    /**
     * Método responsável por criar uma chamada do tipo GET
     * @param array $data - um array com campos do body.
     * @return $this
     */
    public function get(array $data=[])
    {
        $data_string = json_encode($data);
        curl_setopt($this->curl, CURLOPT_CUSTOMREQUEST, "GET");
        curl_setopt($this->curl, CURLOPT_POSTFIELDS, $data_string);
        return $this;
    }

    public function withErrors()
    {
        var_dump($this->errors);
        return $this;
    }

    /**
     * Método responsável por executar a chamada CURL e retornar um array associativo ou erros.
     * @return array|mixed
     */
    public function run()
    {
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);
        $data = curl_exec($this->curl);
        $data = json_decode( $data, true);
        $statusCode = curl_getinfo($this->curl);
        $this->errors = $statusCode;
        curl_close($this->curl);
        if(isset($data['success']) && $data['success']==false){
            $this->data = ["Error" => $data['data']['error']];
            return $this->data;
        }
        $this->data = $data;
        return $this;
    }


    public function data()
    {
        return $this->data;
    }

    public function download($dest)
    {
        set_time_limit(0);
        $fp = fopen ($dest, 'w+');
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, $this->headers);
        curl_setopt($this->curl, CURLOPT_FILE, $fp);
        curl_setopt($this->curl, CURLOPT_FOLLOWLOCATION, true);
        curl_exec($this->curl);
        $statusCode = curl_getinfo($this->curl);
        $this->errors = $statusCode;
        curl_close($this->curl);
        fclose($fp);
        return $this;
    }




}