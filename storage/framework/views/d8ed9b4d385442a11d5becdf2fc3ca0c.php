
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['title' => null, 'subtitle' => null, 'padding' => true]));

foreach ($attributes->all() as $__key => $__value) {
    if (in_array($__key, $__propNames)) {
        $$__key = $$__key ?? $__value;
    } else {
        $__newAttributes[$__key] = $__value;
    }
}

$attributes = new \Illuminate\View\ComponentAttributeBag($__newAttributes);

unset($__propNames);
unset($__newAttributes);

foreach (array_filter((['title' => null, 'subtitle' => null, 'padding' => true]), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div <?php echo e($attributes->merge(['class' => 'bg-white rounded-xl border border-slate-200 shadow-sm'])); ?>>
    <?php if($title): ?>
        <div class="px-5 sm:px-6 py-4 border-b border-slate-100 flex items-center justify-between gap-4">
            <div>
                <h3 class="text-base font-semibold text-slate-800"><?php echo e($title); ?></h3>
                <?php if($subtitle): ?>
                    <p class="text-sm text-slate-400 mt-0.5"><?php echo e($subtitle); ?></p>
                <?php endif; ?>
            </div>
            <?php if(isset($actions)): ?>
                <div class="flex items-center gap-2"><?php echo e($actions); ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo e($padding ? 'p-5 sm:p-6' : ''); ?>">
        <?php echo e($slot); ?>

    </div>
</div>
<?php /**PATH D:\SIGECIR2026\resources\views/components/card.blade.php ENDPATH**/ ?>