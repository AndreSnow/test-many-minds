<?php defined('BASEPATH') or exit('No direct script access allowed'); ?>

<?php $this->load->view('navbar'); ?>

<body>
	<div class="container">
		<div class="row">
			<div class="col-12">
				<h1>Products
					<?php if (
						$this->session->userdata('logged') &&
						$this->session->userdata('logged')->role == '1' &&
						$this->session->userdata('logged')->status == '1'
					) : ?>
						<a href="<?php echo base_url('product/create'); ?>" class="btn btn-primary">
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
							<th scope="col">price</th>
							<th scope="col">description</th>
							<th scope="col">quantity</th>
							<th scope="col">brand</th>
							<th scope="col">collaborator</th>
							<th scope="col">status</th>
							<th scope="col">actions</th>
						</tr>
					</thead>

					<?php

					$products = $this->Product_Model->getAll();

					foreach ($products as $product) : ?>
						<tbody>
							<tr>
								<td><?php echo $product->id; ?></td>
								<td><?php echo $product->name; ?></td>
								<td><?php echo $product->price; ?></td>
								<td><?php echo $product->description; ?></td>
								<td><?php echo $product->quantity; ?></td>
								<td><?php echo $product->brand; ?></td>
								<td><?php echo $product->collaborator; ?></td>
								<td><?php echo $product->status; ?></td>
								<?php if (
									$this->session->userdata('logged') &&
									$this->session->userdata('logged')->status == '1' &&
									($this->session->userdata('logged')->role == '1' ||
										$this->session->userdata('logged')->role == '2'
									)
								) : ?>
									<td>
										<a href="<?php echo base_url('product/edit/' . $product->id); ?>">
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
	</div>

	<?php echo $this->pagination->create_links(); ?>

	<?php $this->load->view('footer'); ?>