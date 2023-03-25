<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('navbar'); ?>

<body>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>Collaborator
                    <?php if (
                        $this->session->userdata('logged') &&
                        $this->session->userdata('logged')->role == '1' &&
                        $this->session->userdata('logged')->status == '1'
                    ) : ?>
                        <a href="<?php echo base_url('collaborator/create'); ?>" class="btn btn-primary">
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
                            <th scope="col">name</th>
                            <th scope="col">last_name</th>
                            <th scope="col">cpf</th>
                            <th scope="col">date_birth</th>
                            <th scope="col">phone</th>
                            <th scope="col">email</th>
                            <th scope="col">status</th>
                            <th scope="col">role</th>
                            <th scope="col">postal_code</th>
                            <th scope="col">country</th>
                            <th scope="col">UF</th>
                            <th scope="col">city</th>
                            <th scope="col">street</th>
                            <th scope="col">number</th>
                            <th scope="col">actions</th>
                        </tr>
                    </thead>

                    <?php

                    $collaborator = $this->Collaborator_Model->getAll();

                    foreach ($collaborator as $collaborator) : ?>
                        <tbody>
                            <tr>
                                <td><?php echo $collaborator->id; ?></td>
                                <td><?php echo $collaborator->name; ?></td>
                                <td><?php echo $collaborator->last_name; ?></td>
                                <td><?php echo $collaborator->cpf; ?></td>
                                <td><?php echo $collaborator->date_birth; ?></td>
                                <td><?php echo $collaborator->phone; ?></td>
                                <td><?php echo $collaborator->email; ?></td>
                                <td><?php echo $collaborator->status; ?></td>
                                <td><?php echo $collaborator->role; ?></td>
                                <td><?php echo $collaborator->postal_code; ?></td>
                                <td><?php echo $collaborator->country; ?></td>
                                <td><?php echo $collaborator->UF; ?></td>
                                <td><?php echo $collaborator->city; ?></td>
                                <td><?php echo $collaborator->street; ?></td>
                                <td><?php echo $collaborator->number; ?></td>
                                <?php if (
                                    $this->session->userdata('logged') &&
                                    $this->session->userdata('logged')->role == '1' &&
                                    $this->session->userdata('logged')->status == '1'
                                ) : ?>
                                    <td>
                                        <a href="<?php echo base_url('collaborator/edit/' . $collaborator->id); ?>">
                                            <i class="fa fa-edit" style="color: #fff;"></i></a>
                                    </td>
                                <?php else : ?>
                                    <td>
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

        <?php echo $this->pagination->create_links(); ?>

        <?php $this->load->view('footer'); ?>