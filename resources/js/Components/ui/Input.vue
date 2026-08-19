<template>
<div class="">
    <input :type="props.type ?? 'text'" :value="modelValue" :class="'border rounded outline-none h-8 w-28 '+ props.class"
    @input='$emit("update:modelValue",($event?.target as HTMLInputElement).value)'
    :name="props.name"
    >
</div>
</template>

<script setup lang="ts">
let variantCss ="";



const props = defineProps<{
    type?: string,
    modelValue?:string,
    name?:string,
    class?:string
 }>();

 defineEmits(["update:modelValue"])
</script>