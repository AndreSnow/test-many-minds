<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>

<body>
    <form class="mx-auto" action="<?= base_url('collaborator/createCollaborator'); ?>" method="post">
        <div class="row" style="margin-left: 40px; margin-top: 40px;">
            <div class="col-md-4">
                <h3>Collaborator</h3>
                <label>Name:</label>
                <input type="text" name="name" class="form-control" required placeholder="Insert your name">
                <br>
                <label>Last name:</label>
                <input type="text" name="last_name" class="form-control" required placeholder="Insert your last name">
                <br>
                <label>CPF:</label>
                <input type="text" name="cpf" class="form-control" required placeholder="Insert your CPF">
                <br>
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" required placeholder="Insert your phone">
                <br>
                <label>Email:</label>
                <input type="email" name="email" class="form-control" required placeholder="Insert your email">
                <br>
                <label>Date birth:</label>
                <input type="date" name="date_birth" class="form-control" required placeholder="Insert your date birth">
                <br>
            </div>
            <div class="col-md-4">
                <h3>Address</h3>
                <label>Postal code:</label>
                <input type="text" name="postal_code" class="form-control" required placeholder="Insert your Postal code">
                <br>
                <label>Country:</label>
                <input type="text" name="country" class="form-control" required placeholder="Insert your country">
                <br>
                <label>UF:</label>
                <input type="text" name="uf" class="form-control" required placeholder="Insert your UF">
                <br>
                <label>City:</label>
                <input type="text" name="city" class="form-control" required placeholder="Insert your city">
                <br>
                <label>Street:</label>
                <input type="text" name="street" class="form-control" required placeholder="Insert your street">
                <br>
                <label>Number:</label>
                <input type="text" name="number" class="form-control" required placeholder="Insert your number">
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
                <label>Role:</label>
                <select name="role" class="form-control" required>
                    <option value=null></option>
                    <option value="1">Administrator</option>
                    <option value="2">Provider</option>
                    <option value="3">User</option>
                </select>
                <br>
                <label>Password:</label>
                <input type="password" name="password" class="form-control" required placeholder="Insert your password">
                <br>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <button type="submit" class="btn btn-primary" style="margin-bottom: auto;">Register</button>
                </div>
            </div>
        </div>
    </form>

    <?php $this->load->view('footer'); ?>