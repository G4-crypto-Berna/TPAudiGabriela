<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Gabriela Bernachea - Suscripción</title>

  <!-- Bootstrap 5 CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <!-- Bootstrap Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
  <!-- Flag Icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flag-icons/css/flag-icons.min.css">
  <!-- Estilos propios opcionales -->
  <link rel="stylesheet" href="style.css">
</head>

<body class="bg-light">
<?php
    $idioma = $_GET['idioma'] ?? 'en';

    $textos = [
        'es' => [
            'titulo' => '¡Bienvenido! Regístrate para suscribirte',
            'descripcion' => '¡No te pierdas de nuestras ofertas y novedades!',
            'nombre' => 'Nombre:',
            'nombre_hint' => 'Puedes ingresar tu nombre, nombre y apellido o un seudónimo.',
            'nombre_placeholder' => 'Ingrese su nombre',
            'email' => 'Correo Electrónico:',
            'email_placeholder' => 'Ingresa tu email',
            'btn' => 'Suscribirse',
            'btn_listar' => 'Mostrar suscriptores'
        ],
        'en' => [
            'titulo' => 'Welcome! Sign up to subscribe',
            'descripcion' => "Don't miss out on our offers and new arrivals!!",
            'nombre' => 'Name:',
            'nombre_hint' => 'You can enter just your first name, full name, or a nickname.',
            'nombre_placeholder' => 'Enter your name',
            'email' => 'Email:',
            'email_placeholder' => 'Enter your email',
            'btn' => 'Subscribe',
            'btn_listar' => 'Show subscribers'
        ],
        'br' => [
            'titulo' => 'Bem-vindo ao TravelPlus',
            'descripcion' => 'Não perca nossas ofertas e novidades!!',
            'nombre' => 'Nome:',
            'nombre_hint' => 'Você pode digitar seu nome, nome e sobrenome ou um pseudônimo.',
            'nombre_placeholder' => 'Digite seu nome',
            'email' => 'E-mail:',
            'email_placeholder' => 'Digite seu e-mail',
            'btn' => 'Inscrever-se',
            'btn_listar' => 'Mostrar inscritos'
        ]
    ];

    $t = $textos[$idioma] ?? $textos['en'];
?>

<div class="container py-4">

    <!-- Selector de Idiomas -->
    <div class="d-flex justify-content-end mb-3 align-items-center">
        <a href="index.php?idioma=es" class="me-3 text-decoration-none" title="Español">
            <span class="fi fi-es fs-4"></span>
        </a>
        <a href="index.php?idioma=en" class="me-3 text-decoration-none" title="English">
            <span class="fi fi-gb fs-4"></span>
        </a>
        <a href="index.php?idioma=br" class="text-decoration-none" title="Português">
            <span class="fi fi-br fs-4"></span>
        </a>
    </div>

    <!-- Tarjeta Principal del Formulario -->
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm border-0">
                
                <!-- Encabezado -->
                <div class="card-header bg-info text-dark text-center py-3">
                    <h1 class="h3 mb-0">
                        <?php echo $t['titulo']; ?> 
                        <i class="bi bi-airplane-engines ms-2"></i>
                    </h1>
                </div>

                <!-- Cuerpo del Formulario -->
                <div class="card-body p-4">
                    <p class="text-center text-muted fs-5 mb-4">
                        <?php echo $t['descripcion']; ?>
                    </p>

                    <form action="exito.php" method="post">
                        
                        <!-- Campo Nombre -->
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">
                                <?php echo $t['nombre']; ?>
                            </label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="<?php echo $t['nombre_placeholder']; ?>" required>
                            <div class="form-text mt-1">
                                <small class="text-muted"><?php echo $t['nombre_hint']; ?></small>
                            </div>
                        </div>

                        <!-- Campo Email -->
                        <div class="mb-4">
                            <label for="email" class="form-label fw-bold">
                                <?php echo $t['email']; ?>
                            </label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="<?php echo $t['email_placeholder']; ?>" required>
                        </div>

                        <!-- Campo Oculto Idioma -->
                        <input type="hidden" name="idioma" value="<?php echo $idioma; ?>">

                        <!-- Botones de Acción -->
                        <div class="d-grid gap-2">
                            <button type="submit" class="btn btn-info text-white fw-bold btn-lg">
                                <?php echo $t['btn']; ?>
                            </button>
                            <a href="listar.php" class="btn btn-outline-secondary">
                                <?php echo $t['btn_listar']; ?>
                            </a>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/style/bootstrap.bundle.min.js"></script>
</body>
</html>