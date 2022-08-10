<?php
	session_start();
	if (isset($_POST['avt'])) {
		try {
			$conn = new PDO('mysql:host=localhost;dbname=test','root','root');

			$query = 'SELECT * FROM `user` WHERE `mail` = "'.$_POST['email'].'" and `password` = "'.$_POST['pass'].'"';

			$result = $conn->query($query);

			$member = $result->rowCount();

			if ($member == 1) {
				$_SESSION['email'] = $_POST['email'];
			}

			$conn = NULL;
			header('Location: index.php');


		} catch (PDOException $e) {
			print 'ERROR: '.$e->getMessage();
			die();
		}
	}
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
						Аутентификация:
						<form action="#" method="POST">
							login:<input type="text" name="email"><br>
							password:<input type="password" name="pass"><br>
							<input type="submit" name="avt" value="Вход">
						</form>
					</div>
				</div>
			</div>
		</main>

	</div>

</body>
</html>