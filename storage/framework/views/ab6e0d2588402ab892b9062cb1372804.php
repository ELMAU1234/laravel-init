<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Grupo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #333;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 16px;
        }

        textarea {
            resize: none;
            height: 100px;
        }

        button {
            width: 100%;
            padding: 15px;
            background-color: #00bfff;
            color: white;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #007acc;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group span {
            color: red;
        }
    </style>
</head>

<body>

    <div class="container">
        <h2>Editar Grupo</h2>

        <!-- Formulario para actualizar grupo -->
        <form action="<?php echo e(route('grupos.update', $grupo->id)); ?>" method="POST" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>
            <div class="form-group">
                <label for="nombre">Nombre del Grupo<span>*</span>:</label>
                <input type="text" id="nombre" name="nombre" required placeholder="Nombre del grupo"
                    onkeyup="buscarGrupos()">
                <div id="listaGrupos"></div> <!-- Aquí aparecerán las sugerencias -->
            </div>

            <script>
                function buscarGrupos() {
                    let nombre = document.getElementById('nombre').value;
                    if (nombre.length >= 2) { // Empieza a buscar después de que haya al menos 2 caracteres
                        fetch(`/buscar-grupos?nombre=${nombre}`)
                            .then(response => response.json())
                            .then(data => {
                                let listaGrupos = document.getElementById('listaGrupos');
                                listaGrupos.innerHTML = ''; // Limpia las sugerencias previas
                                data.forEach(grupo => {
                                    let div = document.createElement('div');
                                    div.innerHTML = grupo.nombre;
                                    div.classList.add('sugerencia');
                                    div.onclick = () => {
                                        document.getElementById('nombre').value = grupo.nombre;
                                        listaGrupos.innerHTML =
                                        ''; // Borra las sugerencias cuando se selecciona una
                                    };
                                    listaGrupos.appendChild(div);
                                });
                            });
                    }
                }
            </script>

            <style>
                /* Estilo básico para las sugerencias */
                .sugerencia {
                    background-color: #f1f1f1;
                    padding: 8px;
                    cursor: pointer;
                }

                .sugerencia:hover {
                    background-color: #ddd;
                }
            </style>

            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion"><?php echo e($grupo->descripcion); ?></textarea>
            </div>

            <div class="form-group">
                <label for="imagen">Imagen del Grupo:</label>
                <input type="file" id="imagen" name="imagen" accept="image/*">
            </div>

            <div class="form-group">
                <label for="contacto_whatsapp">Contacto Número de WhatsApp:</label>
                <input type="text" id="contacto_whatsapp" name="contacto_whatsapp" value="<?php echo e($grupo->contacto_whatsapp); ?>">
            </div>

            <div class="form-group">
                <label for="url_facebook">URL Facebook:</label>
                <input type="text" id="url_facebook" name="url_facebook" value="<?php echo e($grupo->url_facebook); ?>">
            </div>

            <div class="form-group">
                <label for="url_tiktok">URL TikTok:</label>
                <input type="text" id="url_tiktok" name="url_tiktok" value="<?php echo e($grupo->url_tiktok); ?>">
            </div>

            <div class="form-group">
                <label for="url_instagram">URL Instagram:</label>
                <input type="text" id="url_instagram" name="url_instagram" value="<?php echo e($grupo->url_instagram); ?>">
            </div>

            <div class="form-group">
                <label for="url_youtube">URL YouTube:</label>
                <input type="text" id="url_youtube" name="url_youtube" value="<?php echo e($grupo->url_youtube); ?>">
            </div>

            <div class="form-group">
                <label for="genero_musical">Género Musical<span>*</span>:</label>
                <input type="text" id="genero_musical" name="genero_musical" required
                    placeholder="Escribe el género musical" onkeyup="buscarGeneros()">
                <div id="listaGeneros"
                    style="position: absolute; background-color: white; border: 1px solid #ddd; width: 100%; z-index: 1000;">
                </div> <!-- Aquí aparecerán las sugerencias de géneros -->
            </div>

            <script>
                function buscarGeneros() {
                    let genero = document.getElementById('genero_musical').value;
                    if (genero.length >= 2) { // Empieza a buscar después de 2 caracteres
                        fetch(`/buscar-generos?genero=${encodeURIComponent(genero)}`)
                            .then(response => response.json())
                            .then(data => {
                                let listaGeneros = document.getElementById('listaGeneros');
                                listaGeneros.innerHTML = ''; // Limpia las sugerencias anteriores

                                // Verificar si hay datos retornados
                                if (data.length > 0) {
                                    data.forEach(genero => {
                                        let div = document.createElement('div');
                                        div.innerHTML = genero
                                        .genero_musical; // Asumimos que este es el nombre del campo en la base de datos
                                        div.classList.add('sugerencia');
                                        div.onclick = () => {
                                            document.getElementById('genero_musical').value = genero.genero_musical;
                                            listaGeneros.innerHTML =
                                            ''; // Limpia las sugerencias cuando se selecciona una
                                        };
                                        listaGeneros.appendChild(div);
                                    });
                                } else {
                                    let div = document.createElement('div');
                                    div.innerHTML = 'No hay sugerencias';
                                    div.classList.add('sugerencia');
                                    listaGeneros.appendChild(div);
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    } else {
                        // Limpiar las sugerencias si hay menos de 2 caracteres
                        document.getElementById('listaGeneros').innerHTML = '';
                    }
                }
            </script>

            <style>
                /* Estilo básico para las sugerencias */
                .sugerencia {
                    background-color: #f1f1f1;
                    padding: 8px;
                    cursor: pointer;
                    border-bottom: 1px solid #ddd;
                }

                .sugerencia:hover {
                    background-color: #ddd;
                }

                .sugerencia:last-child {
                    border-bottom: none;
                }
            </style>

            <button type="submit">Actualizar Grupo</button>
        </form>

        <!-- Formulario para eliminar grupo -->
        <form action="<?php echo e(route('grupos.destroy', $grupo->id)); ?>" method="POST" style="margin-top: 20px;">
            <?php echo csrf_field(); ?>
            <?php echo method_field('DELETE'); ?>
            <button type="submit" style="background-color: red;">Eliminar Grupo</button>
        </form>
    </div>

</body>

</html>
<?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/grupos/edit.blade.php ENDPATH**/ ?>