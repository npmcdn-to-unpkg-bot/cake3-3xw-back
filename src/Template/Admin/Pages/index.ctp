<section class="panel">
   <header class="panel-heading">
      <?= __('Pages') ?> <small><?= $this->Paginator->counter() ?>
         <span class="tools pull-right">
            <a href="<?=$this->Url->build(["controller" => "pages","action" => "add"]);?>"><i class="fa fa-plus"></i> Add</a>
         </span>
      </header>
      <div class="panel-body">
         <table class="table table-hover general-table">
            <thead>
               <tr>
                  <th><?= $this->Paginator->sort('name') ?></th>
                  <th><?= $this->Paginator->sort('active') ?></th>
                  <th><?= $this->Paginator->sort('main_menu') ?></th>
                  <th><?= $this->Paginator->sort('main_menu_order') ?></th>
                  <th class="actions"><?= __('Actions') ?></th>
               </tr>
            </thead>
            <tbody>
               <?php foreach ($pages as $page): ?>
                  <tr>
                     <td><?= h($page->name) ?></td>
                     <td><?= h($page->active) ?></td>
                     <td><?= h($page->main_menu) ?></td>
                     <td><?= $this->Number->format($page->main_menu_order) ?></td>
                     <td class="actions">
                        <div class="btn-group">
                           <?= $this->Html->link(__('View'), ['action' => 'view', $page->id], ['class' => 'btn btn-default btn-sm']) ?>
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
