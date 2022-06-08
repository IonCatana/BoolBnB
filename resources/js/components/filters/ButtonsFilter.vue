<template>
   <div>
      <h3>{{ name }}</h3>
      <button class="buttonNumber" 
        v-for="(num, i) in availableNumber" 
        :key="i" :value="num"
        @click="getButton($event)"
      >
        {{ num }}
      </button>
    </div>
</template>

<script>
export default {
  props: {
    name: String,
  },

  data() {
    return {
      availableNumber: ['Any', 1, 2, 3, 4, 5, '6+'],
      number: null,
      buttonValue: null, 
    }
  },

  methods: {
    getButton: function(e) {
      this.buttonValue = e.target.value;
      console.log(this.buttonValue);
    },
    
    returnValue() {
      //emit
      // const value = {name: number};
    },
  }
}
</script>

<style>
.buttonNumber {
  padding: 2px 5px;
}
</style>