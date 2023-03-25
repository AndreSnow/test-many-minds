<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>

<body>
    <?php
    $id = $this->uri->segment(3);
    $product = $this->Product_Model->getProductId($id);
    ?>

    <form class="mx-auto" action="<?= base_url('product/updateProduct/' . $product->id); ?>" method="post">
        <div class="row" style="margin-left: 40px; margin-top: 40px;">
            <div class="col-md-4">
                <h3>Product</h3>
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?= $product->name ?>">
                <br>
                <label>Quantity:</label>
                <input type="text" name="quantity" class="form-control" value="<?= $product->quantity ?>">
                <br>
                <label>Price:</label>
                <input type="text" name="price" class="form-control" value="<?= $product->price ?>">
                <br>
                <label>Description:</label>
                <input type="text" name="description" class="form-control" value="<?= $product->description ?>">
                <br>
                <label>Brand:</label>
                <input type="text" name="brand" class="form-control" value="<?= $product->brand ?>">
                <br>
            </div>
            <div class="col-md-2">
                <h3>Permissions</h3>
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value=null></option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
                <br>
                <label>Collaborator:</label>
                <select name="collaborator_id" class="form-control" required>
                    <option value=null></option>
                    <?php foreach ($collaborators as $collaborator) { ?>
                        <option value="<?= $collaborator->id ?>" <?= $collaborator->id == $product->collaborator_id ? 'selected' : '' ?>><?= $collaborator->name ?></option>
                    <?php } ?>
                </select>
                <br>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: auto;">Update</button>
                </div>
            </div>
        </div>
    </form>


    <?php $this->load->view('footer'); ?>