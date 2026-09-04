
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['label', 'value', 'change' => null, 'trend' => 'up', 'icon' => 'chart']));

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

foreach (array_filter((['label', 'value', 'change' => null, 'trend' => 'up', 'icon' => 'chart']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<div class="bg-white rounded-xl border border-slate-200 shadow-sm p-5 sm:p-6">
    <div class="flex items-start justify-between">
        <div>
            <p class="text-sm font-medium text-slate-400"><?php echo e($label); ?></p>
            <p class="mt-2 text-2xl font-bold text-slate-800"><?php echo e($value); ?></p>
        </div>
        <div class="w-11 h-11 rounded-lg bg-primary-50 text-primary-600 flex items-center justify-center flex-shrink-0">
            <span class="w-5 h-5 block"><?php echo $__env->make('layouts.partials.icons', ['icon' => $icon], array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?></span>
        </div>
    </div>

    <?php if($change): ?>
        <div class="mt-4 flex items-center gap-1.5 text-sm">
            <span class="inline-flex items-center gap-1 font-medium <?php echo e($trend === 'up' ? 'text-emerald-600' : 'text-red-600'); ?>">
                <?php if($trend === 'up'): ?>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                <?php else: ?>
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M19 14l-7 7m0 0l-7-7m7 7V3" /></svg>
                <?php endif; ?>
                <?php echo e($change); ?>

            </span>
            <span class="text-slate-400">vs. mes anterior</span>
        </div>
    <?php endif; ?>
</div>
<?php /**PATH D:\SIGECIR2026\resources\views/components/stat-card.blade.php ENDPATH**/ ?>