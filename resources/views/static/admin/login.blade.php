@extends("layouts.admin.clean")

@section("content")
	<br />
	<div class="row">
		<div class="col-md-6 col-md-offset-3">
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>
						Вход в панель
					</h3>
				</div>
				<div class="panel-body">
				@isset($error_message)
					<div class="alert alert-danger">
						{!!$error_message!!}
					</div>
				@endisset
					<form action="/admin/login" method="post" class="form-field">
					{{csrf_field()}}
						<div class="form-group">
							<label for="admin-login">
								Логин администратора:
							</label>
							<input type="text" placeholder="Логин администратора"
							required
							class='form-control'
							name='admin_login'
							id='admin-login'>
						</div>
						<div class="form-group">
							<label for="admin-password">
								Пароль администратора:
							</label>
							<input type="password" placeholder="Пароль"
							required
							name="admin_password"
							class='form-control'
							id='admin-password'>
						</div>
						<div class="form-group">
							<button type="submit" 
							class="btn btn-default">
								Войти
							</button>
						</div>
					</form>
				</div>
			</div>

		</div>
	</div>

@endsection