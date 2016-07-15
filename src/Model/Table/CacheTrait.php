<?php

namespace App\Model\Table;

use Cake\Event\Event;
use Cake\Cache\Cache;

trait CacheTrait
{
   public function afterSave(Event $event) {
      Cache::clear(false);
   }

   public function afterDelete(Event $event) {
      Cache::clear(false);
   }
}
