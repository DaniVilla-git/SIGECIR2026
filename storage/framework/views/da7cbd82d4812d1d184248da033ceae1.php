
<?php $attributes ??= new \Illuminate\View\ComponentAttributeBag;

$__newAttributes = [];
$__propNames = \Illuminate\View\ComponentAttributeBag::extractPropNames((['name', 'title' => null, 'maxWidth' => 'md']));

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

foreach (array_filter((['name', 'title' => null, 'maxWidth' => 'md']), 'is_string', ARRAY_FILTER_USE_KEY) as $__key => $__value) {
    $$__key = $$__key ?? $__value;
}

$__defined_vars = get_defined_vars();

foreach ($attributes->all() as $__key => $__value) {
    if (array_key_exists($__key, $__defined_vars)) unset($$__key);
}

unset($__defined_vars, $__key, $__value); ?>

<?php
    $widths = ['sm' => 'max-w-sm', 'md' => 'max-w-md', 'lg' => 'max-w-lg', 'xl' => 'max-w-xl'];
    $width = $widths[$maxWidth] ?? $widths['md'];
?>

<div
    x-data="{ show: false }"
    x-show="show"
    x-cloak
    @open-modal.window="if ($event.detail === '<?php echo e($name); ?>') show = true"
    @keydown.escape.window="show = false"
    class="fixed inset-0 z-50 overflow-y-auto"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-title-<?php echo e($name); ?>"
>
    <div class="flex min-h-screen items-center justify-center p-4">
        <div
            x-show="show" x-transition.opacity
            @click="show = false"
            class="fixed inset-0 bg-slate-900/50"
            aria-hidden="true"
        ></div>

        <div
            x-show="show"
            x-transition
            class="relative bg-white rounded-xl shadow-xl w-full <?php echo e($width); ?> overflow-hidden"
        >
            <div class="px-5 sm:px-6 py-4 border-b border-slate-100 flex items-center justify-between">
                <h3 id="modal-title-<?php echo e($name); ?>" class="text-base font-semibold text-slate-800"><?php echo e($title); ?></h3>
                <button @click="show = false" type="button" class="text-slate-400 hover:text-slate-600 focus:outline-none" aria-label="Cerrar modal">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

            <div class="px-5 sm:px-6 py-5 space-y-3">
                <?php echo e($slot); ?>

            </div>

            <?php if(isset($footer)): ?>
                <div class="px-5 sm:px-6 py-4 border-t border-slate-100 flex justify-end gap-3 bg-slate-50">
                    <?php echo e($footer); ?>

                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php /**PATH D:\SIGECIR2026\resources\views/components/modal.blade.php ENDPATH**/ ?>