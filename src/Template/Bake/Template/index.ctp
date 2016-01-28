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
  return !in_array($schema->columnType($field), ['binary', 'text']);
})
->take(7);
%>
<section class="panel">
  <header class="panel-heading">
    <?= __('<%= $pluralHumanName %>') ?> <small><?= $this->Paginator->counter() ?>
      <span class="tools pull-right">
        <a href="<?=$this->Url->build(["controller" => "<%= $pluralVar %>","action" => "add"]);?>"><i class="fa fa-plus"></i> Add</a>
      </span>
    </header>
    <div class="panel-body">
      <table class="table table-hover general-table">
        <thead>
          <tr>
            <% foreach ($fields as $field): %>
            <th><?= $this->Paginator->sort('<%= $field %>') ?></th>
            <% endforeach; %>
            <th class="actions"><?= __('Actions') ?></th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($<%= $pluralVar %> as $<%= $singularVar %>): ?>
            <tr>
              <% foreach ($fields as $field) {
                $isKey = false;
                if (!empty($associations['BelongsTo'])) {
                  foreach ($associations['BelongsTo'] as $alias => $details) {
                    if ($field === $details['foreignKey']) {
                      $isKey = true;
                      %>
                      <td><?= $<%= $singularVar %>->has('<%= $details['property'] %>') ? $this->Html->link($<%= $singularVar %>-><%= $details['property'] %>-><%= $details['displayField'] %>, ['controller' => '<%= $details['controller'] %>', 'action' => 'view', $<%= $singularVar %>-><%= $details['property'] %>-><%= $details['primaryKey'][0] %>]) : '' ?></td>
                      <%
                      break;
                    }
                  }
                }
                if ($isKey !== true) {
                  if (!in_array($schema->columnType($field), ['integer', 'biginteger', 'decimal', 'float'])) {
                    %>
                    <td><?= h($<%= $singularVar %>-><%= $field %>) ?></td>
                    <%
                  } else {
                    %>
                    <td><?= $this->Number->format($<%= $singularVar %>-><%= $field %>) ?></td>
                    <%
                  }
                }
              }

              $pk = '$' . $singularVar . '->' . $primaryKey[0];
              %>
            <td class="actions">
              <div class="btn-group">
                <?= $this->Html->link(__('View'), ['action' => 'view', <%= $pk %>], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', <%= $pk %>], ['class' => 'btn btn-default btn-sm']) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', <%= $pk %>], ['class' => 'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', <%= $pk %>)]) ?>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <div class="panel-body">
    <div class="paginator">
      <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers() ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
      </ul>
    </div>
  </div>
</section>
