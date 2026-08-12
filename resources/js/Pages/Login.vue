<template>

<GuestLayout class="dev">
    
    <div class=" login_form p-5 w-full flex  items-center justify-center ">
      <div class="border p-5">
      <div class="flex flex-col mb-10">
        <Icon class="mb-10 self-center"/>

        <div class="navigation_buttons flex mb border rounded-md">
          <span @click="changeOption(true)" :class="(data.signInactive ? 'bg-primary text-white':'')+' border-left px-8 py-1 rounded-l-md'">
          Sign In 
          </span>
          
          <span @click="changeOption(false)" :class="(!data.signInactive ? 'bg-primary text-white':'')+' border-l px-8 py-1 rounded-r-md'">
            Register
          </span>
          </div>
      </div>
      <LoginForm v-if="data.signInactive" :data="data"/>
      <RegistrationForm v-if="!data.signInactive" :data="data"/>
     </div>  
  
    </div>
    </GuestLayout>
</template>

<script setup lang="ts">
import LoginForm from '@/Components/Forms/LoginForm.vue';
import RegistrationForm from '@/Components/Forms/RegistrationForm.vue';
import Icon from '@/Components/Icon.vue';
import Button from '@/Components/ui/Button/Button.vue';
import Input from '@/Components/ui/Input.vue';
import GuestLayout from '@/Layouts/GuestLayout.vue';
import { AuthData } from '@/types/global';
import {reactive, ref} from 'vue';
const data = reactive<AuthData>({
    email:"",
    password:"",
    signInactive:true
});
function changeOption(val:boolean){
  data.signInactive=val;
}
</script>