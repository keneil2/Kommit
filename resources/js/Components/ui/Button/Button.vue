<template>
    <button :class="style + '  ' + getBtnVariant(props?.variant) + ' ' + getBtnSize(size) + ' ' + props.class" :type="props.type ?? 'button'">
  <slot/>
    </button>
</template>

<script setup lang="ts">
import { BtnSizes, BtnVariant, getBtnSize, getBtnVariant } from '.';
const style="inline-flex items-center justify-center gap-2 whitespace-nowrap rounded-md text-sm font-medium transition-all disabled:pointer-events-none disabled:opacity-50 [&_svg]:pointer-events-none [&_svg:not([class*='size-'])]:size-4 shrink-0 [&_svg]:shrink-0 outline-none focus-visible:border-ring focus-visible:ring-ring/50 focus-visible:ring-[3px] aria-invalid:ring-destructive/20 dark:aria-invalid:ring-destructive/40 aria-invalid:border-destructive"
const props = defineProps<{
    variant?:BtnVariant,
    size?:BtnSizes,
    class?:string,
    type?:"button" | "submit" | "reset"
}>();
</script>