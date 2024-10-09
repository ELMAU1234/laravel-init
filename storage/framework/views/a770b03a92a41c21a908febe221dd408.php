<!DOCTYPE html>
<html>
<head>
    <title>Obtener vistas de un video de YouTube</title>
</head>
<body>
    <h1>Obtener vistas de un video de YouTube</h1>

    <form action="/youtube/video" method="GET">
        <label for="video_url">Ingresa la URL del video de YouTube:</label>
        <input type="text" id="video_url" name="video_url" placeholder="">
        <button type="submit">Obtener datos del video</button>
    </form>
    <?php if(isset($views)): ?>
    <h2>Vistas del video: <?php echo e($views); ?></h2>
<?php elseif(isset($error)): ?>
    <h2>Error: <?php echo e($error); ?></h2>
<?php endif; ?>

</body>
</html>
<?php /**PATH D:\xampp\htdocs\proy30\music\resources\views/youtube.blade.php ENDPATH**/ ?>