<?php
class Request extends Thread {
    public $url;
    public $response;
    public function __construct($url) {
        $this->url = $url;
    }
    public function run() {
        $this->response = file_get_contents($this->url);
    }
}