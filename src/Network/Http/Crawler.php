<?php

namespace App\Network\Http;

use Cake\ORM\TableRegistry;

class Crawler {

  public $parser = null;

  public function parse($crawlerId)
  {
    $crawlers = TableRegistry::get('Crawlers');
    $pois = TableRegistry::get('Pois');

    $crawler = $crawlers->find()
      ->contain(['Museums','Parsers'])
      ->where(['Crawlers.id' => $crawlerId])
      ->first()
    ;

    $poi = $pois->find()
      ->contain(['Markers'])
      ->where(['Pois.slug' => $crawler->museum->slug])
      ->first()
    ;

    $this->parser = new $crawler->parser->class;
    $this->parser->prepare( $poi, $crawlerId, $crawler->uri, $crawler->vars );
    $this->parser->parse();
  }

  public function save()
  {
    return $this->parser->save();
  }

}
