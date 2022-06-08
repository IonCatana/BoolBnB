<template>
   <div class="">
      <h3>{{ name }}</h3>
      <button>Any</button>
      <button>1</button>
      <button>2</button>
      <button>3</button>
      <button>4</button>
      <button>5</button>
      <button>6+</button>
    </div>
</template>

<script>
export default {
  props: {
    name: String,

  },
  data() {
    return {
      number: null,
    }
  },
  methods: {
    returnValue() {
      //emit
      const value = {name: number};
    }
  }
}
</script>

<style>

</style>