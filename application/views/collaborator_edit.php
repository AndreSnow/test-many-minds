<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>
<?php $this->load->model('Collaborator_Model'); ?>

<body>

    <?php
    $id = $this->uri->segment(3);
    $collaborator = $this->Collaborator_Model->getCollaboratorId($id);
    ?>

    <form class="mx-auto" action="<?= base_url('collaborator/updateCollaborator/' . $collaborator->id); ?>" method="post">
        <div class="row" style="margin-left: 40px; margin-top: 40px;">
            <div class="col-md-4">
                <h3>Collaborator</h3>
                <label>Name:</label>
                <input type="text" name="name" class="form-control" value="<?= $collaborator->name ?>">
                <br>
                <label>Last name:</label>
                <input type="text" name="last_name" class="form-control" value="<?= $collaborator->last_name ?>">
                <br>
                <label>CPF:</label>
                <input type="text" name="cpf" class="form-control" value="<?= $collaborator->cpf ?>">
                <br>
                <label>Phone:</label>
                <input type="text" name="phone" class="form-control" value="<?= $collaborator->phone ?>">
                <br>
                <label>Email:</label>
                <input type="email" name="email" class="form-control" value="<?= $collaborator->email ?>">
                <br>
                <label>Date birth:</label>
                <input type="date" name="date_birth" class="form-control" value="<?= $collaborator->date_birth ?>">
                <br>
            </div>
            <div class="col-md-4">
                <h3>Address</h3>
                <label>Postal code:</label>
                <input type="text" name="postal_code" class="form-control" value="<?= $collaborator->postal_code ?>">
                <br>
                <label>Country:</label>
                <input type="text" name="country" class="form-control" value="<?= $collaborator->country ?>">
                <br>
                <label>UF:</label>
                <input type="text" name="uf" class="form-control" value="<?= $collaborator->uf ?>">
                <br>
                <label>City:</label>
                <input type="text" name="city" class="form-control" value="<?= $collaborator->city ?>">
                <br>
                <label>Street:</label>
                <input type="text" name="street" class="form-control" value="<?= $collaborator->street ?>">
                <br>
                <label>Number:</label>
                <input type="text" name="number" class="form-control" value="<?= $collaborator->number ?>">
                <br>
            </div>
            <div class="col-md-2">
                <h3>Permissions</h3>
                <label>Status:</label>
                <select name="status" class="form-control" required>
                    <option value=null></option>
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select><br>
                <label>Role:</label>
                <select name="role" class="form-control" required>
                    <option value=null></option>
                    <option value="1">Administrator</option>
                    <option value="2">Provider</option>
                    <option value="3">User</option>
                </select>
                <br>
                <label>Password:</label>
                <input type="password" name="password" class="form-control" value="<?= $collaborator->number ?>">
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