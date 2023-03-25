<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>

<body>
    <form class="mx-auto" action="<?= base_url('product/createProduct'); ?>" method="post">
        <div class="row" style="margin-left: 40px; margin-top: 40px;">
            <div class="col-md-4">
                <h3>Product</h3>
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required placeholder="Insert the product name">
                <br>
                <label>Quantity:</label>
                <input type="text" name="quantity" class="form-control" required placeholder="Insert your quantity">
                <br>
                <label>Price:</label>
                <input type="text" name="price" class="form-control" required placeholder="Insert your price">
                <br>
                <label>Description:</label>
                <input type="text" name="description" class="form-control" placeholder="Insert your description">
                <br>
                <label>Brand:</label>
                <input type="text" name="brand" class="form-control" required placeholder="Insert your brand">
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