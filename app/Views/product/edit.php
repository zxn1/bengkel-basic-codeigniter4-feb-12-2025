<?= $this->extend('product/layout'); ?>
<?= $this->section ('content'); ?>
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>Edit Product</h2>
      </div>
      <div class="pull-right"><a class="btn btn-primary" href="<?= route_to('/') ?>"> Back</a></div>
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
<form action="<?= site_url('update/' . $product->id) ?>"
   method="POST">
   <? csrf_field() ?>
   <div class="row">
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Name:</strong>
            <input type="text" name="name" value="<?= $product->name ?>" class="form-control" placeholder="Name">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Price:</strong>
            <input type="text" name="price" value="<?= $product->price ?>" class="form-control" placeholder="Price">
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12">
         <div class="form-group">
            <strong>Description:</strong>
            <textarea class="form-control" style="height:150px"
               name="description" placeholder="Detail"><?= $product->description ?> </textarea>
         </div>
      </div>
      <div class="col-xs-12 col-sm-12 col-md-12 text-center">
         <button type="submit" class="btn btn-primary">Submit</button> 
      </div>
   </div>
</form>
<?= $this->endSection(); ?>
