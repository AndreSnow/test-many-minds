<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('navbar'); ?>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Purchase
                    <?php if (
                        $this->session->userdata('logged') &&
                        $this->session->userdata('logged')->role == '1' &&
                        $this->session->userdata('logged')->status == '1'
                    ) : ?>
                        <a href="<?php echo base_url('purchase/create'); ?>" class="btn btn-primary">
                            <i class="fa fa-plus"></i></a>
                    <?php else : ?>
                        <a href="">
                            <i class="fa fa-eye-slash" style="color: #000;"></i></a>
                    <?php endif ?>
                </h1>

                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">product</th>
                            <th scope="col">comments</th>
                            <th scope="col">quantity</th>
                            <th scope="col">price</th>
                            <th scope="col">status</th>
                            <th scope="col">collaborator</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>

                    <?php
                    $purchase = $this->Purchase_Model->getAll();

                    foreach ($purchase as $purchase) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $purchase->id; ?></td>
                                <td><?php echo $purchase->product; ?></td>
                                <td><?php echo $purchase->comments; ?></td>
                                <td><?php echo $purchase->quantity; ?></td>
                                <td><?php echo $purchase->price; ?></td>
                                <td><?php echo $purchase->status; ?></td>
                                <td><?php echo $purchase->collaborator; ?></td>
                                <?php if (
                                    $this->session->userdata('logged') &&
                                    $this->session->userdata('logged')->role == '1' &&
                                    $this->session->userdata('logged')->status == '1'
                                ) : ?>
                                    <td>
                                        <a href="<?php echo base_url('purchase/edit/' . $purchase->id); ?>">
                                            <i class="fa fa-edit" style="color: #fff;"></i></a>
                                        <a href="<?php echo base_url('purchase/deletePurchase/' . $purchase->id); ?>">
                                            <i class="fa fa-trash" style="color: #fff;"></i></a>
                                    </td>
                                <?php else : ?>
                                    <td>
                                        <a href="">
                                            <i class="fa fa-eye-slash" style="color: #fff;"></i></a>
                                        <a href="">
                                            <i class="fa fa-eye-slash" style="color: #fff;"></i></a>
                                    </td>
                                <?php endif ?>
                            </tr>
                        </tbody>
                    <?php endforeach ?>
                </table>
            </div>
        </div>
    </div>

    <?php echo $this->pagination->create_links(); ?>

    <?php $this->load->view('footer'); ?>