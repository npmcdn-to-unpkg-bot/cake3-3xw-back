<?php

namespace App\Network\Http;

use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
use App\Model\Entity\Pois;

class Parser extends Client {

  public $Matches = null;

  public $Pois = null;

  public $uri = null;

  public $data = null;

  public $headers = [];

  public $museum = null;

  public function __construct($config = [])
  {
    parent::__construct($config);
    $this->Matches = TableRegistry::get('Matches');
    $this->Pois = TableRegistry::get('Pois');
  }

  public function prepare( Pois $museum, $crawlerId, $uri, $vars )
  {
    $this->uri = $uri;
    $this->museum = $museum;
  }

  public function parse()
  {
    $this->get($this->uri, $this->data, $this->headers);
  }

  public function save()
  {
    return true;
  }

}
