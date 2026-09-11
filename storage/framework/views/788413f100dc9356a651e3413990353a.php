
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['type' => 'info']));

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

foreach (array_filter((['type' => 'info']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $map = [
        'success' => ['bg-emerald-50 text-emerald-700 border-emerald-200', 'text-emerald-500'],
        'error'   => ['bg-red-50 text-red-700 border-red-200', 'text-red-500'],
        'warning' => ['bg-amber-50 text-amber-700 border-amber-200', 'text-amber-500'],
        'info'    => ['bg-primary-50 text-primary-700 border-primary-200', 'text-primary-500'],
    ];
    [$classes, $iconColor] = $map[$type] ?? $map['info'];
?>

<div
    x-data="{ show: true }"
    x-show="show"
    x-transition
    role="alert"
    <?php echo e($attributes->merge(['class' => "flex items-start gap-3 border rounded-lg px-4 py-3 text-sm $classes"])); ?>

>
    <div class="flex-1"><?php echo e($slot); ?></div>
    <button
        @click="show = false"
        type="button"
        class="<?php echo e($iconColor); ?> hover:opacity-70 focus:outline-none"
        aria-label="Cerrar alerta"
    >
        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
    </button>
</div>
<?php /**PATH D:\SIGECIR2026\resources\views/components/alert.blade.php ENDPATH**/ ?>