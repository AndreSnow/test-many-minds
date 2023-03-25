<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('header'); ?>
<?php $this->load->view('navbar'); ?>

<body>
    <div class="container">
        <hr>
        <span style="color: #f00">Obs: Caso não tenha cadastrado, deve solicitar ao Administrador.</span>
        <hr>

        <form class="col-3" style="margin: auto;" action="<?= base_url('auth/validate'); ?>" method="post">
            <label for="exampleInputEmail1" class="form-label" style="margin-top: 20px;">
                <i class="fa fa-user" style="color: #000; margin-right: 10px;">
                </i>Email</label>
            <?php echo form_input(
                array(
                    'name'  => 'email',
                    'class' => 'form-control',
                    'id'    => 'exampleInputEmail1',
                    'placeholder'      => 'exemplo@test.com',
                    'aria-describedby' => 'emailHelp'
                )
            ); ?>
            <label for="exampleInputPassword1" class="form-label">
                <i class="fa fa-key" style="color: #000; margin-right: 10px;">
                </i>Senha</label>
            <?php echo form_password(
                array(
                    'name'  => 'password',
                    'class' => 'form-control',
                    'id'    => 'exampleInputPassword1',
                    'placeholder' => 'password',
                    'style'       => 'margin-bottom: 20px;'
                )
            ); ?>
            <button id="btn-login" type="submit" class="btn btn-dark">
                <i class="fa fa-arrow-right-to-bracket" style="color: #fff;"></i>
            </button>
        </form>
    </div>

    <?php $this->load->view('footer'); ?>