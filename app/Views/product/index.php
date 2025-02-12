<?= $this->extend('product/layout'); ?> 
<?= $this->section ('content'); ?> 
<div class="row">
   <div class="col-lg-12 margin-tb">
      <div class="pull-left">
         <h2>CI 4 CRUD</h2>
      </div>
      <div class="pull-right">
         <a class="btn btn-success" href="<?php echo site_url('/create'); ?>"> Create New Product</a>
      </div>
   </div>
</div>
<?php if ($message = session ()->getFlashdata('success')): ?> 
<div class="alert alert-success">
   <p><?= $message ?></p>
</div>
<?php endif; ?>
<table class="table table-bordered">
   <tr>
      <th>No</th>
      <th>Name</th>
      <th>Details</th>
      <th>Price</th>
      <th>created on</th>
      <th>updated on</th>
      <th width="280px">Action</th>
   </tr>
   <?php $i = 1; ?>
   <?php foreach ($products as $key => $product): ?>
   <tr>
      <td><?= ++$i ?></td>
      <td><?= $product->name ?></td>
      <td><?= $product->description ?></td>
      <td><?= $product->price ?></td>
      <td><?= $product->created_at ?></td>
      <td><?= $product->updated_at ?></td>
      <td>
         <a class="btn btn-info" href="<?= base_url('show/'. $product->id); ?>">Show</a>
         <a class="btn btn-primary" href="<?= base_url('edit/' . $product->id); ?>">Edit</a>
         <a class="btn btn-danger" href="<?= base_url('destroy/' . $product->id); ?>">Delete</a>
      </td>
   </tr>
   <?php endforeach; ?>
</table>
<?= $this->endSection (); ?>
