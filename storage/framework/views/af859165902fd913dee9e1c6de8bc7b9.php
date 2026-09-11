```php


<?php $__env->startSection('titulo'); ?>
    Crear Notificacion
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Nueva notificacion
            </h2>

            <?php if($errors->any()): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-5">
                    <ul>
                        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <li><?php echo e($error); ?></li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </ul>
                </div>
            <?php endif; ?>

            <form action="<?php echo e(route('notificaciones.store')); ?>" method="post">
                <?php echo csrf_field(); ?>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Titulo notificacion</label>
                    <input type="text" name="titulo_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Mensaje notificacion</label>
                    <input type="text" name="mensaje_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Tipo notificacion</label>
                    <input type="text" name="tipo_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Fecha notificacion</label>
                    <input type="datetime-local" name="fecha_notificacion"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label class="block mb-2 font-semibold">Id Usuario</label>
                    <input type="text" name="id_usuario"
                           class="w-full border rounded px-3 py-2">
                </div>

                <div class="text-center">
                    <button type="submit"
                            class="bg-blue-500 text-white px-6 py-2 rounded hover:bg-blue-600">
                        Guardar notificacion
                    </button>
                </div>

            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>
```

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SIGECIR2026\resources\views/notificaciones/create.blade.php ENDPATH**/ ?>