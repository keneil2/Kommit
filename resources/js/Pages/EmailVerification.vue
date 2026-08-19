<template>
  <GuestLayout>
    <div>
        <Input v-model="form.verification_code"/>
         <FormError  :error="form.errors.verification_code"/>
        <Button @click="submit">
         Verify Email
        </Button>
    </div>
  </GuestLayout>

</template>

<script lang="ts" setup >
import FormError from '@/Components/Forms/FormError.vue';
import Button from '@/Components/ui/Button/Button.vue';
import Input from '@/Components/ui/Input.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { useForm } from '@inertiajs/vue3';

const email = new URL(window.location.href).searchParams.get('email');

const form = useForm<{
    verification_code:string
    email:string|null
}>({
 verification_code:'',
 email:email
});

function submit(){

  console.log(form.email);
    form.post("/email-verification");
}
</script>