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

$associations += ['BelongsTo' => [], 'HasOne' => [], 'HasMany' => [], 'BelongsToMany' => []];
$immediateAssociations = $associations['BelongsTo'] + $associations['HasOne'];
$associationFields = collection($fields)
->map(function($field) use ($immediateAssociations) {
  foreach ($immediateAssociations as $alias => $details) {
    if ($field === $details['foreignKey']) {
      return [$field => $details];
    }
  }
})
->filter()
->reduce(function($fields, $value) {
  return $fields + $value;
}, []);

$groupedFields = collection($fields)
->filter(function($field) use ($schema) {
  return $schema->columnType($field) !== 'binary';
})
->groupBy(function($field) use ($schema, $associationFields) {
  $type = $schema->columnType($field);
  if (isset($associationFields[$field])) {
    return 'string';
  }
  if (in_array($type, ['integer', 'float', 'decimal', 'biginteger'])) {
    return 'number';
  }
  if (in_array($type, ['date', 'time', 'datetime', 'timestamp'])) {
    return 'date';
  }
  return in_array($type, ['text', 'boolean']) ? $type : 'string';
})
->toArray();

$groupedFields += ['number' => [], 'string' => [], 'boolean' => [], 'date' => [], 'text' => []];
$pk = "\$$singularVar->{$primaryKey[0]}";
%>
<section class="panel">
  <header class="panel-heading">
    <h3><?= h($<%= $singularVar %>-><%= $displayField %>) ?></h3>
  </header>
  <div class="panel-body">
    <% if ($groupedFields['string']) : %>
    <% foreach ($groupedFields['string'] as $field) : %>
    <% if (isset($associationFields[$field])) :
    $details = $associationFields[$field];
    %>
    <h6 class="subheader"><?= __('<%= Inflector::humanize($details['property']) %>') ?></h6>
    <p><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></p>
    <% else : %>
    <h6 class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></h6>
    <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
    <% endif; %>
    <% endforeach; %>
    <% endif; %>
    <% if ($groupedFields['number']) : %>
    <% foreach ($groupedFields['number'] as $field) : %>
    <h6 class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></h6>
    <p><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></p>
    <% endforeach; %>
    <% endif; %>
    <% if ($groupedFields['date']) : %>
    <% foreach ($groupedFields['date'] as $field) : %>
    <h6 class="subheader"><%= "<%= __('" . Inflector::humanize($field) . "') %>" %></h6>
    <p><?= h($<%= $singularVar %>-><%= $field %>) ?></p>
    <% endforeach; %>
    <% endif; %>
    <% if ($groupedFields['boolean']) : %>
    <% foreach ($groupedFields['boolean'] as $field) : %>
    <h6 class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></h6>
    <p><?= $<%= $singularVar %>-><%= $field %> ? __('Yes') : __('No'); ?></p>
    <% endforeach; %>
    <% endif; %>
    <% if ($groupedFields['text']) : %>
    <% foreach ($groupedFields['text'] as $field) : %>
    <h6 class="subheader"><?= __('<%= Inflector::humanize($field) %>') ?></h6>
    <div class='detail_text'>
      <?= $this->Text->autoParagraph(h($<%= $singularVar %>-><%= $field %>)); ?>
    </div>
    <% endforeach; %>
    <% endif; %>
    <div class="btn-group">
      <?= $this->Html->link(__('Edit <%= $singularHumanName %>'), ['action' => 'edit', <%= $pk %>], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete <%= $singularHumanName %>'), ['action' => 'delete', <%= $pk %>], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?>
    </div>
  </div>

</section>
<%
$relations = $associations['HasMany'] + $associations['BelongsToMany'];
foreach ($relations as $alias => $details):
$otherSingularVar = Inflector::variable($alias);
$otherPluralHumanName = Inflector::humanize($details['controller']);
%>
<section class="panel">
  <header class="panel-heading">
    <?= __('Related <%= $otherPluralHumanName %>') ?>
  </header>
  <div class="panel-body">
    <?php if (!empty($<%= $singularVar %>-><%= $details['property'] %>)): ?>
      <table cellpadding="0" cellspacing="0" class='table general-table'>
        <tr>
          <% foreach ($details['fields'] as $field): %>
          <th><?= __('<%= Inflector::humanize($field) %>') ?></th>
          <% endforeach; %>
          <th class="actions"><?= __('Actions') ?></th>
        </tr>
        <?php foreach ($<%= $singularVar %>-><%= $details['property'] %> as $<%= $otherSingularVar %>): ?>
          <tr>
            <%- foreach ($details['fields'] as $field): %>
            <td><?= h($<%= $otherSingularVar %>-><%= $field %>) ?></td>
            <%- endforeach; %>

            <%- $otherPk = "\${$otherSingularVar}->{$details['primaryKey'][0]}"; %>
            <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['controller' => '<%= $details['controller'] %>', 'action' => 'view', <%= $otherPk %>],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Html->link(__('Edit'), ['controller' => '<%= $details['controller'] %>', 'action' => 'edit', <%= $otherPk %> ],['class'=>'btn btn-xs btn-default']) ?>
                <?= $this->Form->postLink(__('Delete'), ['controller' => '<%= $details['controller'] %>', 'action' => 'delete', <%= $otherPk %>],['class'=>'btn btn-xs btn-danger'], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $otherPk %>)]) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </table>
    <?php endif; ?>
  </div>
</section>
<% endforeach; %>
