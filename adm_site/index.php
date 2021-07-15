<?php
include 'service/database.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Administrador</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="script/ajax.js"></script>
</head>

<body>
	<div class="container">
		<p id="success"></p>
		<div class="table-wrapper">
			<div class="table-title">
				<div class="row">
					<div class="col-sm-6">
						<h2>Gerenciador de <b>moderadores!</b></h2>
					</div>
					<div class="col-sm-6">
						<a href="#addModeratorModal" class="btn btn-success" data-toggle="modal"><i class="material-icons">&#xE147;</i> <span>Adicionar moderador</span></a>
						<a href="JavaScript:void(0);" class="btn btn-danger" id="delete_multiple"><i class="material-icons">&#xE15C;</i> <span>Excluir</span></a>
					</div>
				</div>
			</div>
			<table class="table table-striped table-hover">
				<thead>
					<tr>
						<th>
							<span class="custom-checkbox">
								<input type="checkbox" id="selectAll">
								<label for="selectAll"></label>
							</span>
						</th>
						<th>NÚMERO</th>
						<th>NOME</th>
						<th>SOBRENOME</th>
						<th>EMAIL</th>
						<th>TELEFONE</th>
						<th>AÇÃO</th>
					</tr>
				</thead>
				<tbody>

					<?php
					$result = mysqli_query($conn, "SELECT * FROM PEV_MODERATOR");
					$i = 1;
					while ($row = mysqli_fetch_array($result)) {
					?>
						<tr id="<?php echo $row["ID"]; ?>">
							<td>
								<span class="custom-checkbox">
									<input type="checkbox" class="user_checkbox" data-user-id="<?php echo $row["ID"]; ?>">
									<label for="checkbox2"></label>
								</span>
							</td>
							<td><?php echo $i; ?></td>
							<td><?php echo $row["NAME"]; ?></td>
							<td><?php echo $row["LAST_NAME"]; ?></td>
							<td><?php echo $row["EMAIL"]; ?></td>
							<td><?php echo $row["PHONE"]; ?></td>
							<td>
								<a href="#editModeratorModal" class="edit" data-toggle="modal">
									<i class="material-icons update" data-toggle="tooltip" data-id="<?php echo $row["ID"]; ?>" data-name="<?php echo $row["NAME"]; ?>" data-lastname="<?php echo $row["LAST_NAME"]; ?>" data-email="<?php echo $row["EMAIL"]; ?>" data-phone="<?php echo $row["PHONE"]; ?>" title="Edit">&#xE254;</i>
								</a>
								<a href="#deleteModeratorModal" class="delete" data-id="<?php echo $row["ID"]; ?>" data-toggle="modal">
									<i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i>
								</a>
							</td>
						</tr>
					<?php
						$i++;
					}
					?>
				</tbody>
			</table>

		</div>
	</div>
	<!-- Add -->
	<div id="addModeratorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="moderator_form">
					<div class="modal-header">
						<h4 class="modal-title">Adicionar Moderador</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<div class="form-group">
							<label>NOME</label>
							<input type="text" id="name" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>SOBRENOME</label>
							<input type="text" id="lastname" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" id="email" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>TELEFONE</label>
							<input type="phone" id="phone" name="phone" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="1" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-success" id="btn-add">Adicionar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Edit -->
	<div id="editModeratorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="update_form">
					<div class="modal-header">
						<h4 class="modal-title">Editar moderador</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_u" name="id" class="form-control" required>
						<div class="form-group">
							<label>NOME</label>
							<input type="text" id="name_u" name="name" class="form-control" required>
						</div>
						<div class="form-group">
							<label>SOBRENOME</label>
							<input type="text" id="lastname_u" name="lastname" class="form-control" required>
						</div>
						<div class="form-group">
							<label>EMAIL</label>
							<input type="email" id="email_u" name="email" class="form-control" required>
						</div>
						<div class="form-group">
							<label>TELEFONE</label>
							<input type="phone" id="phone_u" name="phone" class="form-control" required>
						</div>
					</div>
					<div class="modal-footer">
						<input type="hidden" value="2" name="type">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-info" id="update">Atualizar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Delete -->
	<div id="deleteModeratorModal" class="modal fade">
		<div class="modal-dialog">
			<div class="modal-content">
				<form>
					<div class="modal-header">
						<h4 class="modal-title">Excluir Moderador</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					</div>
					<div class="modal-body">
						<input type="hidden" id="id_d" name="id" class="form-control">
						<p>Tem certeza que deseja excluir esse moderador?</p>
						<p class="text-warning"><small>Esta ação não pode ser desfeita.</small></p>
					</div>
					<div class="modal-footer">
						<input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
						<button type="button" class="btn btn-danger" id="delete">Excluir</button>
					</div>
				</form>
			</div>
		</div>
	</div>

</body>

</html>