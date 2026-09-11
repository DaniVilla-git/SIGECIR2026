
<?php $__env->startSection('titulo'); ?>
    Editar Usuario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">
                Editar Usuario
            </h2>

            <form action="<?php echo e(route('usuarios.update', $usuario->id)); ?>" method="post">
                <?php echo csrf_field(); ?>
                <?php echo method_field('PUT'); ?>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Primer Nombre</label>
                        <input type="text" name="primer_nombre" value="<?php echo e($usuario->primer_nombre); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Segundo Nombre</label>
                        <input type="text" name="segundo_nombre" value="<?php echo e($usuario->segundo_nombre); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Primer Apellido</label>
                        <input type="text" name="primer_apellido" value="<?php echo e($usuario->primer_apellido); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Segundo Apellido</label>
                        <input type="text" name="segundo_apellido" value="<?php echo e($usuario->segundo_apellido); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Telefono Usuario</label>
                        <input type="number" name="telefono_usuario" value="<?php echo e($usuario->telefono_usuario); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    
                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Correo Usuario</label>
                        <input type="text" name="correo_usuario" value="<?php echo e($usuario->correo_usuario); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Regimen Usuario</label>
                        <input type="text" name="regimen_usuario" value="<?php echo e($usuario->regimen_usuario); ?>" class="w-full border rounded px-3 py-2">
                    </div>
                    
                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Fecha Registro</label>
                        <input type="date" name="fecha_registro" value="<?php echo e($usuario->fecha_registro); ?>" class="w-full border rounded px-3 py-2">
                    </div>

                    <div class="mb-5">
                        <label for="" class="block mb-2 font-semibold">Usuario Registro</label>
                        <input type="date" name="usuario_registro" value="<?php echo e($usuario->fecha_registro); ?>" class="w-full border rounded px-3 py-2">
                    </div>                   
                   
                <div>
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SIGECIR2026\resources\views/Usuarios/update.blade.php ENDPATH**/ ?>