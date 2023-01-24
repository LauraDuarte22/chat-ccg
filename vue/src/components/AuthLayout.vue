<template>
    <div class="min-h-full flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8"
    >
        <div class="max-w-md w-full space-y-8">
            <router-view></router-view>
        </div>
    </div>
</template>

<style>

button[type="submit"] {
    background-color:whitesmoke;
    color: black;

}
button[type="submit"]:hover,
button[type="submit"]:focus {
    background-color: #3c3b3c;
    color: white;
}

</style>

<script>
import { LockClosedIcon } from "@heroicons/vue/20/solid";
export default {
    
  components: {
    LockClosedIcon,
  },
}
</script>