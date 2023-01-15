<script setup>
  import Paper from './helpers/Paper.vue'
  import Rock from './helpers/Rock.vue'
  import Scissors from './helpers/Scissors.vue'
  import TriangleSvg from '../assets/triangle.svg'

  const btns = [
    {
      name: 'paper',
      class: 'btn-icon -top-16 -left-8 from-primary-paperFrom to-primary-paperTo',
      icon: Paper
    },
    {
      name: 'scissors',
      class: 'btn-icon -top-16 -right-8 from-primary-scissorsFrom to-primary-scissorsTo',
      icon: Scissors
    },
    {
      name: 'rock',
      class: 'btn-icon -bottom-8 from-primary-rockFrom to-primary-rockTo',
      icon: Rock
    },
  ]

  const emit = defineEmits(['set-player-select'])

  const playerSelect = (select) => {
    emit('set-player-select', select);
  }

</script>

<template>
  <section class="px-4 py-40 w-full lg:w-1/3 mx-auto">
    <div class="relative flex justify-center items-center">
      <img :src="TriangleSvg" alt="Triangle" />
      <button
        v-for="(btn, i) in btns"
        :key="i"
        :class="btn.class"
        @click="playerSelect(btn.name)"
      >
        <component :is="btn.icon" sizes="w-32 h-32" />
      </button>
    </div>
  </section>
</template>