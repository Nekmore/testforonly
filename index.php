<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="styles/style.css">
	<title>Auth</title>
</head>
<body>

	<div class="wrapper">

		<nav>
			<div class="container">
				<div class="container__row">
					<div class="container__content">
						<ul>
							<li><a href="avt.php"><button>Вход</button></a></li>
							<li><a href="reg.php"><button>Регистрация</button></a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<header>
		</header>
		<main>
			<div class="container">
				<div class="container__row">
					<div class="container__content">
						<?php 
							if (isset($_SESSION['email']) and (!empty($_SESSION['email']))) {
							echo '
							Вы успешно авторизировались <br>
							Пользователь: '.$_SESSION['email'].'<br>
							';
							}
						?>
						<?php 
							if (isset($_SESSION['email']) and (!empty($_SESSION['email']))) {
								echo '
									<a href="exit.php">Выход</a>
								';
							}
						?>
					</div>
				</div>
			</div>
		</main>

	</div>

</body>
</html>