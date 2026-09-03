
<?php $__env->startSection('titulo'); ?>
    Usuario
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-lg rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-3xl font-bold text-gray-700">
                    Listado de Usuarios
                </h2>

                <a href="<?php echo e(route('usuarios.create')); ?>"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                    Nuevo usuario

                </a>

            </div>

            <?php if(session('success')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

             <?php if(session('actualizar')): ?>
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">

                    <?php echo e(session('actualizar')); ?>

                </div>
            <?php endif; ?>

            <?php if(session('eliminar')): ?>
                <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">

                    <?php echo e(session('eliminar')); ?>

                </div>
            <?php endif; ?>

            <table class="min-w-full border border-gray-300">

                <thead class="bg-gray-200">

                    <tr>

                        <th class="border px-4 py-2">
                            ID
                        </th>

                        <th class="border px-4 py-2">
                            Primer Nombre
                        </th>

                        <th class="border px-4 py-2">
                            Segundo Nombre
                        </th>

                         <th class="border px-4 py-2">
                            Primer Apellido
                        </th>

                         <th class="border px-4 py-2">
                            Segundo Apellido
                        </th>

                        <th class="border px-4 py-2">
                            Telefono
                        </th>

                        <th class="border px-4 py-2">
                            Correo electronico
                        </th>

                         <th class="border px-4 py-2">
                            EPS
                        </th>

                         <th class="border px-4 py-2">
                            Regimen
                        </th>

                         <th class="border px-4 py-2">
                            Fecha Registro
                        </th>

                         <th class="border px-4 py-2">
                            Usuario Registra 
                        </th>

                    </tr>

                </thead>

                <tbody>

                <?php $__currentLoopData = $usuarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $usuarios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border px-4 py-2"><?php echo e($usuarios->id); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->primer_nombre); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->segundo_nombre); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->primer_apellido); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->segundo_apellido); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->telefono_usuario); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->correo_usuario); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->eps_usuario); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->regimen_usuario); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->fecha_registro); ?></td>
                        <td class="border px-4 py-2"><?php echo e($usuarios->usuario_registro); ?></td>
                        <td class="border px-4 py-2">


                            <a href="<?php echo e(ROUTE('usuarios.edit',$usuarios->id)); ?>"class="bg-blue-400 hover:bg-blue-600 text-white rounded px-2 py-2">Editar</a>
                            <form action="<?php echo e(ROUTE('usuarios.destroy',$usuarios->id)); ?>" method="post">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="bg-red-400 hover:bg-red-600 text-white rounded px-2 py-2">Eliminar</button>                         
                            </form>

                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>  

                </tbody>
                
            </table>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SIGECIR2026\resources\views/Usuarios/index.blade.php ENDPATH**/ ?>