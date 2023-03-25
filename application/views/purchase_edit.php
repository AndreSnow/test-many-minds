<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>

<body>
    <?php
    $id = $this->uri->segment(3);
    $purchase = $this->Purchase_Model->getPurchaseId($id);
    ?>
    <form class="mx-auto" action="<?= base_url('purchase/updatePurchase/' . $purchase->id); ?>" method="post">
        <div class="row" style="margin-left: 40px; margin-top: 40px;">
            <div class="col-md-4">
                <h3>Purchase</h3>
                <label>Product:</label>
                <input type="text" name="product" class="form-control" value="<?= $purchase->product ?>">
                <br>
                <label>Quantity:</label>
                <input type="text" name="quantity" class="form-control" value="<?= $purchase->quantity ?>">
                <br>
                <label>Comments:</label>
                <input type="text" name="comments" class="form-control" value="<?= $purchase->comments ?>">
                <br>
                <label>Price:</label>
                <input type="text" name="price" class="form-control" value="<?= $purchase->price ?>">
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
                <label>collaborator:</label>
                <select name="status" class="form-control" required>
                    <option value=null></option>
                    <option value="<?= $this->session->userdata('logged')->id ?>">
                        <?= $this->session->userdata('logged')->name ?>
                    </option>
                </select>
                <br>
            </div>
        </div>
        <div class="row">
            <div class="col-12 text-center">
                <button type="submit" class="btn btn-primary" style="margin-bottom: auto;">Update</button>
            </div>
        </div>
        </div>
    </form>

    <?php $this->load->view('footer'); ?>