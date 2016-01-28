<!-- hack for boostrap 3 modal that removes the first form element found -->
<form class="form-inline" role="form"></form>

<!-- browse panel -->
<div class="attachment-browse">

  <!-- Tools -->
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Filters</h3>
    </div>

    <div class="panel-body">
      <!-- active filters -->
      <?php if(!empty($filter)): ?>
        <div class="alert alert-success">
          <b>Active filter</b>: <?= $filter ?>
        </div>
      <?php endif; ?>

      <!-- TITLE and NAME search -->
      <form id="attachment-filter-by-search-form" class="form-inline" role="form" method="GET" action="<?= $this->Url->build( array( 'action' => $this->request->params['action'])  ) ?>">
        <div class="form-group">
          <label class="sr-only" for="attachment-filter-by-search-input">Search</label>
          <input type="text" class="form-control" id="attachment-filter-by-search-input" name="search" placeholder="Type title or name">
        </div>
        <button id="attachment-filter-by-search-btn" type="submit"  class="btn btn-primary">Search</button>
      </form>
      <p></p>

      <!-- TAGS search -->
      <form id="attachment-filter-by-tags-form" class="form-inline" role="form" method="GET" action="<?= $this->Url->build( array( 'action' => $this->request->params['action'])  ) ?>">
        <div class="form-group">
          <label class="sr-only" for="tags-search">Search by tags</label>
          <select multiple id="attachment-filter-by-tags-input" name="tags[]" ></select>
        </div>
        <button id="attachment-filter-by-tags-btn" type="submit"  class="btn btn-primary">Search by tags</button>
      </form>
      <p></p>

      <!-- filter by subtypes -->
      <form id="attachment-filter-by-subtype-form" class="form-inline" role="form" method="GET" action="<?php echo $this->Url->build( array( 'action' => $this->request->params['action'])  ); ?>">
        <div class="form-group">
          <select id="attachment-filter-by-subtype-input" name="filter" class="form-control" sytle="min-width:100px;">
            <option value="-1">All</option>
            <?php foreach ($subtypes as $subtype) { ?>
                <option value="<?php echo $subtype->{'DISTINCT Attachments'}['subtype'] ?>"><?php echo $subtype->{'DISTINCT Attachments'}['subtype'] ?></option>
            <?php } ?>
          </select>
        </div>
        <button id="attachment-filter-by-subtype-btn" type="submit" class="btn btn-info">Filter</button>
      </form>
    </div>
  </div>

  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">Sort</h3>
    </div>
    <div class="panel-body">
      <!-- active sorts -->
      <?php if(!empty($sort)): ?>
        <div class="alert alert-success">
          <b>Sorted by</b>: <?= $sort ?>
        </div>
      <?php endif; ?>

      <!-- SORT -->
      <form class="form-inline" >
        <div class="form-group">
          <?php echo $this->Paginator->sort('name', '<button id="attachment-sort-by-name" class="btn btn-info" type="button" >Sort by name</button>', array('escape' => false)); ?>
          <?php echo $this->Paginator->sort('created', '<button id="attachment-sort-by-created" class="btn btn-info" type="button" >Sort by created</button>', array('escape' => false)); ?>
          <?php echo $this->Paginator->sort('date', '<button id="attachment-sort-by-date" class="btn btn-info" type="button" >Sort by date</button>', array('escape' => false)); ?>
          <?php echo $this->Paginator->sort('subtype', '<button id="attachment-sort-by-subtype" class="btn btn-info" type="button" >Sort by subtype</button>', array('escape' => false)); ?>
        </div>
      </form>
    </div>
  </div>

  <!-- records -->
  <div class="panel panel-info">
    <div class="panel-heading">
      <h3 class="panel-title">
        <?php echo __('List of Attachments'); ?> <small><?= $this->Paginator->counter() ?> </small>
      </h3>
    </div>
    <div class="panel-body">

      <div class="paginator">
        <ul class="pagination">
          <?= $this->Paginator->prev('< ' . __('previous')) ?>
          <?= $this->Paginator->numbers() ?>
          <?= $this->Paginator->next(__('next') . ' >') ?>
        </ul>
      </div>

      <div class="row">
        <?php foreach ($attachments as $attachment): ?>
          <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3">
            <?php echo $this->element('Attachments/thumb', array(
              'attachment' => $attachment
            )); ?>
          </div>
        <?php endforeach; ?>
      </div>
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
  </div>
</div>
