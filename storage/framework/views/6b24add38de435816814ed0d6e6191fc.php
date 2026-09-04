
<?php $__env->startSection('titulo'); ?>
    Servicios
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">

        <div class="bg-white shadow-lg rounded-lg p-6">

            <div class="flex justify-between items-center mb-6">

                <h2 class="text-3xl font-bold text-gray-700">
                    Listado de Servicios
                </h2>

                <a href="<?php echo e(route('servicios.create')); ?>"
                class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded">

                    Nuevo Servicio

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
                            Codigo Servicio
                        </th>

                        <th class="border px-4 py-2">
                            Nombre Servicio
                        </th>

                         <th class="border px-4 py-2">
                            Grupo servicio
                        </th>

                         <th class="border px-4 py-2">
                            Id profesional
                        </th>

                        
                    </tr>

                </thead>

                <tbody>

                <?php $__currentLoopData = $servicios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $servicios): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr class="text-center hover:bg-gray-50">
                        <td class="border px-4 py-2"><?php echo e($servicios->id); ?></td>
                        <td class="border px-4 py-2"><?php echo e($servicios->codigo_servicio); ?></td>
                        <td class="border px-4 py-2"><?php echo e($servicios->nombre_servicio); ?></td>
                        <td class="border px-4 py-2"><?php echo e($servicios->grupo_servicio); ?></td>
                        <td class="border px-4 py-2"><?php echo e($servicios->id_profesional); ?></td>
                        <td class="border px-4 py-2">


                            <a href="<?php echo e(ROUTE('servicios.edit',$servicios->id)); ?>"class="bg-blue-400 hover:bg-blue-600 text-white rounded px-2 py-2">Editar</a>
                            <form action="<?php echo e(ROUTE('servicios.destroy',$servicios->id)); ?>" method="post">
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
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SIGECIR2026\resources\views/Servicios/index.blade.php ENDPATH**/ ?>