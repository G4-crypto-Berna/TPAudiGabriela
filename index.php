<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gabriela Bernachea</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
  <link rel="stylesheet" href="style.css">
</head>

<body>
<?php
    $idioma = $_GET['idioma'] ?? 'en';

    $textos = [
        'es' => [
            'titulo' => 'Bienvenido!! Registrate para suscribirte',
            'descripcion' => '¡No te pierdas de nuestras ofertas y novedades!',
            'nombre' => 'Nombre:',
            'nombre_hint' => 'Puedes ingresar tu nombre, nombre y apellido o un seudonimo.',
            'nombre_placeholder' => 'Ingrese su nombre',
            'email' => 'Correo Electrónico:',
            'email_placeholder' => 'Ingresa tu email',
            'btn' => 'Suscribirse'
        ],
        'en' => [
            'titulo' => 'Welcome!! sing up to subscribe',
            'descripcion' => 'Dont miss out on our offers and new arrivals!!',
            'nombre' => 'Name:',
            'nombre_hint' => 'You can enter just your first name, first and last name, or a nickname.',
            'nombre_placeholder' => 'Enter your name',
            'email' => 'Email:',
            'email_placeholder' => 'Enter your email',
            'btn' => 'Subscribe'
        ],
        'br' => [
            'titulo' => 'Bem-vindo ao TravelPlus',
            'descripcion' => 'Nao perca nossas ofertas e novidades!!',
            'nombre' => 'Nome:',
            'nombre_hint' => 'Você pode digitar seu nome, nome e sobrenome ou um pseudônimo.',
            'nombre_placeholder' => 'Digite seu nome',
            'email' => 'E-mail:',
            'email_placeholder' => 'Digite seu e-mail',
            'btn' => 'Inscrever-se'
        ]
    ];

    $t = $textos[$idioma] ?? $textos['en'];
?>
<div class="d-flex justify-content-end p-3">
    <a href="index.php?idioma=es" class="me-2">
        <span class="fi fi-es" style="font-size: 1.5rem;"></span>
    </a>
    <a href="index.php?idioma=en" class="me-2">
        <span class="fi fi-gb" style="font-size: 1.5rem;"></span>
    </a>
    <a href="index.php?idioma=br">
        <span class="fi fi-br" style="font-size: 1.5rem;"></span>
    </a>
</div>
<div class="container-fluid p-2 my-3 bg-info text-dark text-center">
        <h1>
            <?php 
                echo $t['titulo'];
                echo '<i class="bi bi-airplane"></i>';
            ?>
        </h1>
    </div>

    <div>
        <P>
            <?php 
                echo $t['descripcion']; 
            ?>
        </P>
    </div>


    <form action="exito.php" method="post">
        <div class="mb-3">
            <label for="nombre" class="form-label">
                <?php 
                    echo $t['nombre']; 
                ?>
            </label>
            <span class="badge bg-light text-dark">
                <?php 
                    echo $t['nombre_hint']; 
                ?>
            </span> <br>
            <input type="text" class="form-control-lg" id="nombre" name="nombre" placeholder="<?php echo $t['nombre_placeholder']; ?>">
        </div>


        <div class="mb-3 mt-3">
            <label for="email" class="form-label">
                <?php 
                    echo $t['email']; 
                ?>
            </label> <br>
            <input type="email" class="form-control-lg" id="email" name="email" placeholder="<?php echo $t['email_placeholder']; ?>" >
        </div>

        <input type="hidden" name="idioma" value="<?php echo $idioma; ?>">

        <button type="submit" class="btn btn-info">
            <?php 
                echo $t['btn']; 
            ?>
        </button>

        <a href="listar.php" class="btn btn-info">Mostrar suscriptores</a>
    </form>
</div>


    <script src="js/bootstrap.js"></script>





</body>
</html>