<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?php echo base_url() ?>" style="margin-left: 80px;">TMM</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo base_url('product') ?>">Product</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo base_url('purchase') ?>">Purchase</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?php echo base_url('collaborator') ?>">Collaborator</a>
        </li>
      </ul>
      <?php if ($this->session->userdata('logged')) : ?>
        <a class="btn btn-outline-danger" style="margin-left: 20px; margin-right: 80px;" href="<?php echo base_url('auth/logout') ?>">Logout</a>
      <?php else : ?>
        <a class="btn btn-outline-primary" style="margin-left: 20px; margin-right: 80px;" href="<?php echo base_url('auth') ?>">Login</a>
      <?php endif; ?>
    </div>
  </div>
</nav>