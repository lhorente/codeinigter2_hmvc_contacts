<div class="row">
	<div class="col-md-12">
	<!-- general form elements disabled -->
		<div class="box box-warning">
			<form role="form" method="post">
				<div class="box-header">
					<h3 class="box-title">Editar contato</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<!-- text input -->
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="name" class="form-control" placeholder="Nome" value="<?php echo $user->name ?>">
					</div>

					<div class="form-group">
						<label>Sexo</label>
						<select class="form-control" name="gender">
						<option value="">Selecione</option>
						<option value="M" <?php echo ($user->gender == 'M' ? 'selected' : '') ?>>Masculino</option>
						<option value="F" <?php echo ($user->gender == 'F' ? 'selected' : '') ?>>Feminino</option>
						<option value="O" <?php echo ($user->gender == 'O' ? 'selected' : '') ?>>Outro</option>
						</select>
					</div>

					<div class="form-group">
						<label>Telefone</label>
						<input type="text" name="phone" class="form-control input-telefone" placeholder="Telefone" value="<?php echo $user->phone ?>">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email ?>">
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Alterar</button>
				</div>
			</form>
		</div><!-- /.box -->
	</div>
</div>
			