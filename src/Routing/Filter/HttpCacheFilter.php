<?php
namespace App\Routing\Filter;

use Cake\Event\Event;
use Cake\Routing\DispatcherFilter;
use Cake\Log\Log;
use Cake\Cache\Cache;

class HttpCacheFilter extends DispatcherFilter
{
  public function afterDispatch(Event $event)
  {
    $request = $event->data['request'];
    $response = $event->data['response'];
    $cache = ($this->config('cache'))? $this->config('cache') : 'default';
    if ($response->statusCode() === 200) {
      Cache::write($request->here(), $response->body(), $cache);
    }
  }
}
