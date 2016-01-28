<section class="panel">
    <header class="panel-heading">
        <?= __('Edit Role') ?>
    </header>
    <div class="panel-body">
        <div class="position-center">
            <?= $this->Form->create($role); ?>
            <?php
                            echo $this->Form->input('name', array('class' => 'form-control'));
                            echo $this->Form->input('description', array('class' => 'form-control'));
                ?>
                <hr>
                <div class="btn-group">
                        <?= $this->Html->link(__('Cancel'), $referer, ['class' => 'btn btn-danger']) ?>
                        <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-success']) ?>
                        <?= $this->Form->end() ?>
                </div>
        </div>
    </div>
</section>
