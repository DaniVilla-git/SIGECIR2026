
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['status']));

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

foreach (array_filter((['status']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $map = [
        'activo'   => 'bg-emerald-50 text-emerald-700 ring-emerald-600/20',
        'pendiente'=> 'bg-amber-50 text-amber-700 ring-amber-600/20',
        'inactivo' => 'bg-slate-100 text-slate-600 ring-slate-500/20',
    ];
    $key = strtolower($status);
    $classes = $map[$key] ?? 'bg-slate-100 text-slate-600 ring-slate-500/20';
?>

<span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ring-1 ring-inset <?php echo e($classes); ?>">
    <?php echo e($status); ?>

</span>
<?php /**PATH D:\SIGECIR2026\resources\views/components/badge.blade.php ENDPATH**/ ?>