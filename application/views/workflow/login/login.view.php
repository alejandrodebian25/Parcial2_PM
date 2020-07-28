<?php
if($this->session->flashdata('mensaje'))
{
echo '
<div class="alert alert-danger alert-dismissible fade show" role="alert">
<strong>Algo salio mal!</strong>  '.$this->session->flashdata("mensaje").'
<button type="button" class="close" data-dismiss="alert" aria-label="Close">
<span aria-hidden="true">&times;</span>
</button>
</div>
';
}
?>
<div
	class="container-fluid full d-flex align-items-center justify-content-center"
>
	<div class="row">
		<div class="">
			<div class="card">
				<div class="card-header text-center">
					Ingresar al sistema
				</div>
				<div class="card-body">
					<form action="<?php echo base_url('workflow/login/validar'); ?>" method="POST">
						<div class="form-group">
							<label for="ci">Usuario</label>
							<input type="text" name="ci" id="ci" class="form-control" placeholder="Ingrese su CI" />
						</div>
						<div class="form-group">
							<label for="clave">Password</label>
							<input
								type="password"
								class="form-control"
								id="clave"
                                name="clave"
                                placeholder="Ingrese su constraseña"
							/>
						</div>
						<button type="submit" class="btn btn-block btn-primary">
							Ingresar
						</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
