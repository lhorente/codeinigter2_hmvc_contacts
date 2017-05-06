<div class="row">
	<div class="col-md-12">
	<!-- general form elements disabled -->
		<div class="box box-warning">
			<form role="form" method="post">
				<div class="box-header">
					<h3 class="box-title">Inserir contato</h3>
				</div><!-- /.box-header -->
				<div class="box-body">
					<!-- text input -->
					<div class="form-group">
						<label>Nome</label>
						<input type="text" name="name" class="form-control" placeholder="Nome">
					</div>

					<div class="form-group">
						<label>Sexo</label>
						<select class="form-control" name="gender">
						<option value="">Selecione</option>
						<option value="M">Masculino</option>
						<option value="F">Feminino</option>
						<option value="O">Outro</option>
						</select>
					</div>

					<div class="form-group">
						<label>Telefone</label>
						<input type="text" name="phone" class="form-control input-telefone" placeholder="Telefone">
					</div>

					<div class="form-group">
						<label>Email</label>
						<input type="text" name="email" class="form-control" placeholder="Email">
					</div>
				</div><!-- /.box-body -->
				<div class="box-footer">
					<button type="submit" class="btn btn-primary">Inserir</button>
				</div>
			</form>
		</div><!-- /.box -->
	</div>
</div>
			