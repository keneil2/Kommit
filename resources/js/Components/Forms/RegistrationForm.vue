<template>
   <div>
    <div>
        <label>Username</label>
      <Input v-model="form.name"  class="w-full mb-3"/>
      <FormError v-if="form.errors.name" :error="form.errors.name"/>
      </div>
      <div>
        <label>Email</label>
      <Input v-model="form.email"  class="w-full mb-3"/>
      <FormError v-if="form.errors.email" :error="form.errors.email"/>
      </div>
      <div>
        <label >Password</label>
        <Input v-model="form.password"  class="w-full mb-3"/>
        <FormError v-if="form.errors.password" :error="form.errors.password"/>
      </div>
      <div>
        <label >Retype Password</label>
        <Input v-model="form.password_confirmation"  class="w-full mb-3"/>
      <FormError v-if="form.password_confirmation" :error="form.errors.password_confirmation"/>
      </div>
    
    <Button class="text-white w-full" @click="submit">
      Register
    </Button>
    <!-- <div class="text-sm inline">
<input type="checkbox" class="w-fit"/>
<span class="inline">Remember me</span>
    </div>
     <a href="#" class="" >forgot password</a> -->
    </div>

</template>
<script lang="ts" setup>
import { AuthData } from '@/types/global';
import Input from '../ui/Input.vue';
import Button from '../ui/Button/Button.vue';
import { Form, useForm } from '@inertiajs/vue3';
import FormError from './FormError.vue';
const form = useForm<{
  name:string,
  email?:string, 
  password?:string, 
  password_confirmation:string, 

}>({
  name:"",
  email: '',
  password: '',
  password_confirmation: '',
});
const props=defineProps<{
    data:AuthData
}>();

function submit(){
  form.post("/register")
}
</script>