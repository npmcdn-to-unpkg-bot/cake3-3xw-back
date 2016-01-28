<%
/**
* CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
* Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
*
* Licensed under The MIT License
* For full copyright and license information, please see the LICENSE.txt
* Redistributions of files must retain the above copyright notice.
*
* @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
* @link          http://cakephp.org CakePHP(tm) Project
* @since         0.1.0
* @license       http://www.opensource.org/licenses/mit-license.php MIT License
*/
use Cake\Utility\Inflector;

$fields = collection($fields)
->filter(function($field) use ($schema) {
  return $schema->columnType($field) !== 'binary';
});
%>
<section class="panel">
  <header class="panel-heading">
    <?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?>
  </header>
  <div class="panel-body">
    <div class="position-center">
      <?= $this->Form->create($<%= $singularVar %>); ?>
      <?php
      <%
      foreach ($fields as $field) {
        if (in_array($field, $primaryKey)) {
          continue;
        }
        if (isset($keyFields[$field])) {
          $fieldData = $schema->column($field);
          if (!empty($fieldData['null'])) {
            %>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'empty' => true]);
            <%
          } else {
            %>
            echo $this->Form->input('<%= $field %>', ['options' => $<%= $keyFields[$field] %>, 'class' => 'form-control']);
            <%
          }
          continue;
        }
        if (!in_array($field, ['created', 'modified', 'updated'])) {
          $fieldData = $schema->column($field);
          if (($fieldData['type'] === 'date') && (!empty($fieldData['null']))) {
            %>
            echo $this->Form->input('<%= $field %>', array('empty' => true, 'default' => '', 'class' => 'form-control'));
            <%
          }   else {
            %>
            echo $this->Form->input('<%= $field %>', array('class' => 'form-control'));
            <%
          }
        }
      }
      if (!empty($associations['BelongsToMany'])) {
        foreach ($associations['BelongsToMany'] as $assocName => $assocData) {
          %>
          echo $this->Form->input('<%= $assocData['property'] %>._ids', ['options' => $<%= $assocData['variable'] %>, 'class' => 'form-control']);
          <%
        }
      }
      %>
      ?>
      <hr>
      <div class="btn-group">
        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-danger']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
      </div>
      <?= $this->Form->end() ?>
    </div>
  </div>
</section>
