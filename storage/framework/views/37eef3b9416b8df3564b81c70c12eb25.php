

<?php $__env->startSection('content'); ?>
<div class="flex flex-col min-h-screen">
    <!-- Header -->
    <header class="bg-white p-4">
        <div class="container mx-auto">
            <div class="text-center text-2xl font-bold">
                <span class="text-navy">MUSIC-</span>
                <span class="text-cyan-400">a un CLICK</span>
            </div>
            <nav class="mt-2">
                <ul class="flex justify-center space-x-4 text-sm">
                    <li><a href="<?php echo e(route('home')); ?>" class="text-gray-600 hover:text-gray-800">Inicio</a></li>
                    <li><a href="<?php echo e(route('search.artists')); ?>" class="text-gray-600 hover:text-gray-800">Buscar Artista(s)</a></li>
                    <li><a href="<?php echo e(route('search.categories')); ?>" class="text-gray-600 hover:text-gray-800">Buscar Categoría Musical</a></li>
                    <li><a href="<?php echo e(route('request.advice')); ?>" class="text-gray-600 hover:text-gray-800">Solicitar Asesoramiento</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <main class="flex-grow">
        <div class="relative bg-gray-800 text-white h-96">
            <img 
                src="<?php echo e(asset('images/hero-background.jpg')); ?>" 
                alt="Music background" 
                class="w-full h-full object-cover object-center"
            >
            <div class="absolute inset-0 bg-black opacity-50"></div>
            <div class="absolute inset-0 flex items-center">
                <div class="container mx-auto px-4 flex items-center">
                    <img 
                        src="<?php echo e(asset('images/music-note-logo.png')); ?>" 
                        alt="Music note logo" 
                        class="w-32 h-32 mr-8"
                    >
                    <div>
                        <h1 class="text-4xl font-bold mb-4">
                            EL ARTISTA QUE NECESITAS A UN SOLO CLICK
                        </h1>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Contacta a los artistas que quieras
                            </li>
                            <li class="flex items-center">
                                <svg class="w-5 h-5 mr-2 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                                </svg>
                                Coopera para cumplir tus objetivos
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\proy30\music\resources\views/inicio.blade.php ENDPATH**/ ?>