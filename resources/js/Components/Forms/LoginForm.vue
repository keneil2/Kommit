<template>
    <Form action="/auth">
   <div>
      <div>
        <FormError v-if="page.props.errors.auth_error" :error="page.props.errors.auth_error"/>  
        <label>Email</label>
      <Input v-model="form.email" name="email" class="w-full mb-3"/>
        <FormError v-if="form.errors.email" :error="form.errors.email"/>
    </div>
      <div>
        <label >Password</label>
        <Input v-model="form.password" name="password" class="w-full mb-3"/>
        <FormError v-if="form.errors.password" :error="form.errors.password"/>
      </div>
    
    <Button class="text-white w-full" @click="submit">
      Login
    </Button>
    <!-- <div class="text-sm inline">
<input type="checkbox" class="w-fit"/>
<span class="inline">Remember me</span>
    </div>
     <a href="#" class="" >forgot password</a> -->
    </div>
    </Form>

</template>
<script lang="ts" setup>
import { AuthData } from '@/types/global';
import Input from '../ui/Input.vue';
import Button from '../ui/Button/Button.vue';
import { Form, useForm, usePage } from '@inertiajs/vue3';
import FormError from './FormError.vue';

const form= useForm<{
  email:string,
  password:string,
  
}>({
  email:"",
  password:"",
})
const page = usePage();
 function submit(){
  form.post("/auth");
 }
</script>