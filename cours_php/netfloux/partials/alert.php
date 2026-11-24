<?php
$msg = null;
$class = null;

if (!empty($alertError)) {
  $msg = $alertError;
  $class = 'danger';
} elseif (!empty($alertSuccess)) {
  $msg = $alertSuccess;
  $class = 'success';
}
?>

<?php if ($msg) { ?>
  <div class="alert alert-<?= $class ?>" role="alert">
    <?= $msg ?>
  </div>
<?php } ?>