

<?php $__env->startSection('titulo'); ?>
    Crear Usuario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">

                Nuevo Usuario
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

            <form action="<?php echo e(route('usuarios.store')); ?>" method="post">
            <?php echo csrf_field(); ?>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Primer Nombre</label>
                    <input type="text" name="primer_nombre" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Segundo Nombre</label>
                    <input type="text" name="segundo_nombre" class="w-full border rounded px-3 py-2">
                </div>

               
                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Primer Apellido</label>
                    <input type="text" name="primer_apellido" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Segundo Apellido</label>
                    <input type="text" name="segundo_apellido" class="w-full border rounded px-3 py-2">
                </div>

                 <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Telefono Usuario</label>
                    <input type="text" name="telefono_usuario" class="w-full border rounded px-3 py-2">
                </div>

                 <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Correo Usuario</label>
                    <input type="text" name="correo_usuario" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">EPS Usuario</label>
                    <input type="text" name="eps_usuario" class="w-full border rounded px-3 py-2">
                </div>
                
                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Regimen Usuario</label>
                    <input type="text" name="regimen_usuario" class="w-full border rounded px-3 py-2">
                </div>

                 <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Fecha Registro</label>
                    <input type="date" name="fecha_registro" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Usuario Registro</label>
                    <input type="text" name="usuario_registro" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            
            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SIGECIR2026\resources\views/Usuarios/create.blade.php ENDPATH**/ ?>