<?php
use Cake\Core\Configure;
use Cake\I18n\I18n;
use Cake\Utility\Inflector;

$languages = Configure::read('I18n.languages');
$language = I18n::locale();

$this->Html->script(['locale.js'],['block' => 'script']);
$this->Html->scriptBlock('var languages = '.  json_encode($languages).'; var language = "'.$language.'";', ['block' => 'script']);

$li = $fieldInputs = $originalFieldInputs = '';
foreach( $languages as $lng )
{
  //active
  $active = ( $lng == $language )? 'active': '';

  //class
  $class = 'locale-'.$lng;

  // tabs
  $li .= $this->Html->tag(
    'li',
    $this->Html->link($lng, '#locale-selector-ul', ['aria-controls' => '#locale-selector-ul']),
    [
      'role' => 'presentation',
      'class' => $active
    ]
  );

  // fields
  foreach($fields as $field)
  {
    $label = Inflector::humanize($field).' ('.$lng.')';
    if( $lng == I18n::defaultLocale() )
    {
      $fieldInputs .= $this->Form->input($field, ['class' => 'form-control '.$class, 'label' => $label]);
    }else{
      $fieldInputs .= $this->Form->input('_translations.'.$lng.'.'.$field, ['class' => 'form-control '.$class, 'label' => $label,'required' => false]);
    }
  }
}

?>
<div class="locale-area">
  <ul id="locale-selector-ul" class="nav nav-tabs" role="tablist">
    <?= $li; ?>
  </ul>
  <div class="tab-locale">
    <?= $fieldInputs ?>
    <?= $originalFieldInputs ?>
  </div>
</div>
