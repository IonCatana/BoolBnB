<template>
    <div class="container" id="app">
        <input
            v-model="value"
            type="range"
            class="mySlider"
            min="1"
            max="100"
            @click="returnValue($event)"
        />

        <span :style="warning()" class="rangeValue">
            {{ value }} km
        </span>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                value: "20", //TODO server ragiona in metri, cambiare a km!
            }
        }, 

        methods: {
            warning: function () {
            if (this.value > 1) {
                    return {
                    color: "#e74c3c",
                    animation: "anim .3s ease-in 1 alternate",
                    };
                }
            },

            returnValue: function(e) {
                const filter = {
                    'name': 'range',
                    'value': this.value,
                };

                console.log(filter);
                this.$emit('pick-filter', filter);
            },
        }
    }
</script>

<style lang="scss" scoped>
// Slide Range Km
.container .mySlider {
  appearance: none;
  width: 100%;
  background-color: #d3d3d3;
  border-radius: 20px;
  outline: none;
  opacity: 0.7;
  transition: opacity 0.2s ease-in;
  -webkit-transition: opacity 0.2s ease-in;
}

/*hover on range slider*/
.container .mySlider:hover {
  opacity: 1;
}

/* chrome and safari supporter */
.container .mySlider::-webkit-slider-thumb {
  appearance: none;
  height: 20px;
  width: 20px;
  border-radius: 50%;
  background-color: #e74c3c;
  cursor: pointer;
  transition: all 0.3s ease-in;
}

.container .mySlider::-moz-range-thumb {
  appearance: none;
  height: 40px;
  width: 40px;
  border-radius: 50%;
  background-color: #e74c3c;
  cursor: pointer;
  transition: all 0.3s ease-in;
  border: 2px solid #d3d3d3;
}

/* hover on slider thumb */
.container .mySlider::-webkit-slider-thumb:hover {
  box-shadow: 2px 2px 20px rgba(0, 0, 0, 0.4);
}

/* Range Value Span */
.container .rangeValue {
  height: 40px;
  width: 60px;
  border: 1px solid #fff;
  color: #fff;
  font-weight: 600;
  text-align: center;
  font-size: 22px;
  line-height: 38px;
}

/* Draw with ::before on span*/
.container .rangeValue::before {
  content: "";
  height: 10px;
  width: 10px;
  transform: rotate(45deg);
}
</style>