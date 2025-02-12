<?= $this->extend('product/layout'); ?> <?= $this->section ('content'); ?>
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>Add New Product</h2>
      </div>
      <div class="pull-right">
         <a class="btn btn-primary" href="<?= site_url('/') ?>">
         Back</a>
      </div>
   </div>
</div>
<?php if (session ()->has ('errors')): ?>
<div class="alert alert-danger">
   <strong>Whoops!</strong> There were some problems with your
   input.<br><br>
   <ul>
      <?php foreach (session ('errors') as $error): ?>
      <li><?= $error ?></li>
      <?php endforeach; ?>
   </ul>
</div>
<?php endif; ?>
<form action="<?= site_url('store') ?>" method="POST">
   <?= csrf_field() ?>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" class="form-control" placeholder="Name">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Price:</strong>
            <input type="number" step="0.01" name="price" class="form-control" placeholder="Price">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group"> <strong>Detail:</strong>
            <textarea class="form-control" style="height:150px" name="description" placeholder="Detail"></textarea>
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center"> <button type="submit" class="btn btn-primary">Submit</button> </div>
   </div>
</form>
<?= $this->endSection(); ?>
