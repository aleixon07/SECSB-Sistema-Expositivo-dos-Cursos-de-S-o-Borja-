<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="styles.css">
  <title>Formulário de Login</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300&family=Shadows+Into+Light&display=swap" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  <style>
    body {
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      background-color: rgb(0, 89, 255);
      font-family: 'Poppins', sans-serif;
    }

    .login-container {
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
      text-align: center;
      height: 370px;
      width: 350px;
    }

    .login-form {
      display: flex;
      flex-direction: column;
      align-items: center;
      font-size: 20px;
      margin-top: 35px;
    }

    label {
      margin-bottom: 5px;
    }

    input {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border: 1px solid #ccc;
      border-radius: 5px;
    }

    button {
      padding: 10px 20px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
      margin-top: 30px;
      font-size: 20px;
    }

    button:hover {
      background-color: #0056b3;
    }
  </style>
</head>

<body>

  <div class="login-container">
    <h1>LOGIN</h1>
    <form action="login.php" method="POST" class="login-form">
      <label for="nome">E-mail:</label>
      <input type="email" id="nome" name="nome" required>

      <label for="password">Senha:</label>
      <input type="password" id="senha" name="senha" required>

      <button type="submit">Entrar</button>
    </form>
  </div>
</body>
<?php if (!isset($_GET['error'])) {
} else if ($_GET['error'] == 1) {
?>
  <script>
    Swal.fire({
      title: "Atenção!",
      text: "Não foram encontrados usuários!",
      icon: "error",

      allowOutsideClick: true,
      allowEscapeKey: true,

      confirmButtonColor: "#3085d6",
      confirmButtonText: "OK"
    }).then((result) => {

      window.location.href = "form_login.php";

    });
  </script>
<?php } else if ($_GET['error'] == 2) {
?>
  <script>
    Swal.fire({
      title: "Atenção!",
      text: "E-mail ou senha incorretos!",
      icon: "error",

      allowOutsideClick: true,
      allowEscapeKey: true,

      confirmButtonColor: "#3085d6",
      confirmButtonText: "OK"
    }).then((result) => {

      window.location.href = "form_login.php";

    });
  </script>
<?php } ?>

</html>