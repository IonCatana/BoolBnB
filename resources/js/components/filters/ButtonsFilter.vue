<template>
   <div>
      <h3>{{ name }}</h3>
      <button class="buttonNumber" 
        v-for="(num, i) in availableNumber" 
        :key="i" :value="num"
        @click="returnValue($event)"
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
      value: null,
    }
  },

  methods: {
    returnValue: function(e) {
      const filter = {
        'name': this.name,
        'value': e.target.value,
      };
      // console.log(filter);
      this.$emit('pick-filter', filter);
    },
  }
}
</script>

<style>
.buttonNumber {
  padding: 2px 5px;
}
</style>