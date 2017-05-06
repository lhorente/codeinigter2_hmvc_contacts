<?php if ($users){ ?>
<table id="tableUsers">
	<thead>
		<tr>
			<th>Nome</th>
			<th>Sexo</th>
			<th>Telefone</th>
			<th>Email</th>
			<th>Excluir</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($users as $user){ ?>
		<tr>
			<td><a href="<?php echo base_url() ?>users/users/edit/<?php echo $user->id ?>"><?php echo $user->name ?></a></td>
			<td><?php echo $user->gender ?></td>
			<td><?php echo $user->phone ?></td>
			<td><?php echo $user->email ?></td>
			<td><a href="<?php echo base_url() ?>users/users/remove/<?php echo $user->id ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></td>
		</tr>
		<?php } ?>
	</tbody>
</table>
<?php } else { ?>
<div class="well">Nenhum usuário cadastrado</div>
<?php } ?>