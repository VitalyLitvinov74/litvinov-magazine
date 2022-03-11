<template>
  <span @click="addToCard">
    <slot>

    </slot>
  </span>
</template>
<script>
export default {
  methods:{
    addToCard: function (){
      console.log('hello')
    }
  }
}
</script>
