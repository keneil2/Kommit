<template>
    <Form action="/auth">
   <div>
      <div>
        <label>Email</label>
      <Input v-model="data.email" name="email" class="w-full mb-3"/>
      </div>
      <div>
        <label >Password</label>
        <Input v-model="data.password" name="password" class="w-full mb-3"/>
      </div>
    
    <Button class="text-white w-full" >
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
import { Form } from '@inertiajs/vue3';

const props=defineProps<{
    data:AuthData
}>();


</script>