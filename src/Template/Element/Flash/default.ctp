<?php
$class = 'message';
if (!empty($params['class'])) {
    $class .= ' ' . $params['class'];
}
?>
<div class="col-md-12 alert alert-info <?= h($class) ?>"><?= h($message) ?></div>
