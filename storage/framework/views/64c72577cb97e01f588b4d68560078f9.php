

<?php $__env->startSection('titulo'); ?>
    Crear Servicio
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="container mx-auto mt-10">

        <div class="max-w-xl mx-auto bg-white shadow-lg rounded-lg p-8">

            <h2 class="text-3xl font-bold text-center mb-6">

                Nuevo Servicio
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

            <form action="<?php echo e(route('servicios.store')); ?>" method="post">
            <?php echo csrf_field(); ?>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Codigo Servicio</label>
                    <input type="text" name="codigo_servicio" class="w-full border rounded px-3 py-2">
                </div>

                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Nombre Servicio</label>
                    <input type="text" name="nombre_servicio" class="w-full border rounded px-3 py-2">
                </div>

               
                <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Grupo servicio</label>
                    <input type="text" name="grupo_servicio" class="w-full border rounded px-3 py-2">
                </div>

                 <div class="mb-5">
                    <label for="" class="block mb-2 font-semibold">Id profesional</label>
                    <input type="text" name="id_profesional" class="w-full border rounded px-3 py-2">
                </div>

           </select>
                    
                </div>

                 
                <div class="mb-5">
                    <button type="submit" class="bg-green-500 hover:bg-green-600 text-white rounded px-5 py-2">Guardar</button>
                </div>
            
            </form>

        </div>

    </div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\SIGECIR2026\resources\views/servicios/create.blade.php ENDPATH**/ ?>