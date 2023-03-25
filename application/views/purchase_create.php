<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>

<body>
    <form class="mx-auto" action="<?= base_url('purchase/createPurchase'); ?>" method="post">
        <div class="row" style="margin-left: 40px; margin-top: 40px;">
            <div class="col-md-4">
                <h3>Purchase</h3>
                <label>Product:</label>
                <input type="text" name="product" class="form-control" required placeholder="Insert the product">
                <br>
                <label>Quantity:</label>
                <input type="text" name="quantity" class="form-control" required placeholder="Insert your quantity">
                <br>
                <label>Comments:</label>
                <input type="text" name="comments" class="form-control" required placeholder="Insert your comments or description">
                <br>
                <label>Price:</label>
                <input type="text" name="price" class="form-control" required placeholder="Insert your price">
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
                <button type="submit" class="btn btn-primary" style="margin-bottom: auto;">Register</button>
            </div>
        </div>
        </div>
    </form>

    <?php $this->load->view('footer'); ?>