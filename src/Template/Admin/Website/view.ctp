<section class="panel">
  <header class="panel-heading">
    <h3><?= h($website->name) ?></h3>
  </header>
  <div class="panel-body">
                <h6 class="subheader"><?= __('Name') ?></h6>
    <p><?= h($website->name) ?></p>
                <h6 class="subheader"><?= __('Email') ?></h6>
    <p><?= h($website->email) ?></p>
                <h6 class="subheader"><?= __('Google Analytics') ?></h6>
    <p><?= h($website->google_analytics) ?></p>
                <h6 class="subheader"><?= __('Facebook') ?></h6>
    <p><?= h($website->facebook) ?></p>
                <h6 class="subheader"><?= __('Twitter') ?></h6>
    <p><?= h($website->twitter) ?></p>
                        <h6 class="subheader"><?= __('Id') ?></h6>
    <p><?= $this->Number->format($website->id) ?></p>
                            <h6 class="subheader"><?= __('Description') ?></h6>
    <div class='detail_text'>
      <?= $this->Text->autoParagraph(h($website->description)); ?>
    </div>
            <div class="btn-group">
      <?= $this->Html->link(__('Edit Website'), ['action' => 'edit', $website->id], ['class'=>'btn btn-default btn-sm']) ?>
      <?= $this->Form->postLink(__('Delete Website'), ['action' => 'delete', $website->id], ['class'=>'btn btn-danger btn-sm'], ['confirm' => __('Are you sure you want to delete # {0}?', $website->id)]) ?>
    </div>
  </div>

</section>
