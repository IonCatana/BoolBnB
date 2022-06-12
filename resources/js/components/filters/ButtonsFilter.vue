<template>
   <div>
      <h2>{{ name }}</h2>

      <button class="buttonNumber btn py-2 px-3 mx-2" 
        v-for="(num, i) in availableNumber" 
        :key="i" :value="num"
        :class="[(activeIndex == i)? 'active' : '']"
        @click="returnValue($event, i)"
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
      activeIndex: 0,
    }
  },

  methods: {
    returnValue: function(e, i) {
      let queryfiedName = this.queryfy(this.name);
      const filter = {
        'name': queryfiedName,
        'value': e.target.value,
      };
      if (filter.value === 'Any') filter.value = null;
      if (filter.value === '6+') filter.value = 6;

      this.$emit('pick-filter', filter);

      this.activeIndex = i;
    },

    queryfy(str) {
      return str.toLowerCase()
        .trim()
        .replace(/[^\w\s-]/g, '')
        .replace(/[\s_-]+/g, '_')
        .replace(/^-+|-+$/g, '');
    },
  },
}
</script>

<style lang="scss" scoped>
@import "../../../sass/_variables.scss";

.buttonNumber {
  border: none;
  background-color: #d3d3d3;
  color: $boolean-blue;

  &:hover{
    background-color: $boolean-blue;
    color: white;
  }

  &.active{
    background-color: $boolean-green;
    color: white;
  }
}


</style>