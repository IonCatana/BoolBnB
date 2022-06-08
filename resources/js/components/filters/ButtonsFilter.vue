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
      let queryfiedName = this.queryfy(this.name);
      const filter = {
        'name': queryfiedName,
        'value': e.target.value,
      };
      if (filter.value === 'Any') filter.value = null;
      if (filter.value === '6+') filter.value = 6;
      console.log('buttons', filter);
      this.$emit('pick-filter', filter);
    },

    queryfy(str) {
      return str.toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '_')
        .replace(/^-+|-+$/g, '');
    },
  }
}
</script>

<style>
.buttonNumber {
  padding: 2px 5px;
}
</style>