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
<div class="col-md-12">
  <?= $this->Form->create($<%= $singularVar %>); ?>
  <section class="panel panel-default">
    <header class="panel-heading">
      <h3><?= __('<%= Inflector::humanize($action) %> <%= $singularHumanName %>') ?></h3>
    </header>
    <div class="panel-body">
      <div class="position-center">
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
              echo $this->Form->input('<%= $field %>', ['empty' => true, 'default' => '', 'class' => 'form-control']);
              <%
            }   else {
              %>
              echo $this->Form->input('<%= $field %>', ['class' => 'form-control']);
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
      </div>
    </div>
    <div class="panel-footer">
      <div class="btn-group">
        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-sm btn-info']) ?>
        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-sm btn-success']) ?>
      </div>
    </div>
  </section>
  <?= $this->Form->end() ?>
</div>
