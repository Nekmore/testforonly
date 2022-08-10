<?php
	session_start();

	if (isset($_POST['reg'])) {
		$conn = new PDO('mysql:host=localhost;dbname=test','root','root');
		$query = 'SELECT * FROM `user` WHERE `mail` = "'.$_POST['ema'].'"';
		$result = $conn->query($query);
		$member = $result->rowCount();
		if(!empty($member)){
			echo 'Данная почта уже занята';

		} elseif ($_POST['pass'] != $_POST['passr']) {
			echo "Пароли не совпадают";
		} else {
			try {
				$conn = new PDO('mysql:host=localhost;dbname=test','root','root');
				$query = 'INSERT INTO `user`(`name`,`mail`,`password`) VALUES (:nam,:ema,:pas)';
				$stmt = $conn->prepare($query);
				$data = [
					'nam'	=> $_POST['name'], 
					'ema'	=> $_POST['ema'],
					'pas'	=> $_POST['pass'],
				];
				$stmt->execute($data);
				$conn = NULL;
				header('Location: avt.php');
			} catch (PDOException $e) {
				print 'ERROR: '.$e->getMessage();
				die();
			}
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
						Регистрация
						<form action="#" method="POST">
							name:<input type="text" name="name" required><br>
							email:<input type="text" name="ema" required><br>
							password:<input type="password" name="pass" required><br>
							password repeat:<input type="password" name="passr" required><br>
							<input type="submit" name="reg" value="Регистрация">
						</form>
					</div>
				</div>
			</div>
		</main>

	</div>

</body>
</html>