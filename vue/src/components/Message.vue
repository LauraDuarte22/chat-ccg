<template>
    <div class="div">
        <span v-if="!sender">{{ name }}</span>
        <div class="felx" :class="sender ?'flex-row-reverse': ''">
            <div class="text w-3/4" :class="sender ?'bg-green-800': 'bg-gray-700'">
                <slot></slot>
            </div>

        </div>
    </div>
</template>
<script setup>

const props=defineProps({
    name:{type:String,default:''},
    photo:{type:String,default:''},
    sender:{type:Boolean,default:false}
})

</script>
