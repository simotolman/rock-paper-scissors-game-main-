<script setup>
  import { ref, onMounted } from 'vue'

  import Paper from './helpers/Paper.vue'
  import Rock from './helpers/Rock.vue'
  import Scissors from './helpers/Scissors.vue'

  const btns = [
    {
      name: 'paper',
      class: 'btn-icon-result from-primary-paperFrom to-primary-paperTo',
      icon: Paper
    },
    {
      name: 'scissors',
      class: 'btn-icon-result from-primary-scissorsFrom to-primary-scissorsTo',
      icon: Scissors
    },
    {
      name: 'rock',
      class: 'btn-icon-result from-primary-rockFrom to-primary-rockTo',
      icon: Rock
    },
  ]
  const computer = ref(4)
  const result = ref("")

  const props = defineProps(['player'])
  const emit = defineEmits(['play-again', 'set-score'])

  const getBtnIndex = (player) => btns.map(item => item.name).indexOf(player)
  const selectRandom = () => {
    computer.value = Math.floor(Math.random() * 3)
  }
  const ChoiceWinner = (playerChoice, computerChoice) => {
    // Draw
    if (playerChoice === computerChoice)
      return "DRAW"
    // paper vs rock = paper win
    if (playerChoice === "paper" && computerChoice === "rock")
      return "YOU WIN"
    if (playerChoice === "rock" && computerChoice === "paper")
      return "YOU LOSE"
    // rock vs scissors = rock win
    if (playerChoice === "rock" && computerChoice === "scissors")
      return "YOU WIN"
    if (playerChoice === "scissors" && computerChoice === "rock")
      return "YOU LOSE"
    // scissors vs paper = scissors win
    if (playerChoice === "scissors" && computerChoice === "paper")
      return "YOU WIN"
    if (playerChoice === "paper" && computerChoice === "scissors")
      return "YOU LOSE"
  }
  const getResult = () => {
    const playerChoice = props.player;
    const computerChoice = btns[computer.value].name
    result.value = ChoiceWinner(playerChoice, computerChoice)
    emit('set-score', result.value)
  }
  const playAgain = () => {
    emit('play-again')
  }

  onMounted(() => {
    setTimeout(() => selectRandom(), 1000)
    setTimeout(() => getResult(), 1500)
  })

</script>

<template>
  <section class="px-4 py-12 w-full lg:w-4/5 mx-auto">
    <div class="relative flex flex-col lg:flex-row justify-between items-center gap-12">
      <div class="flex flex-col justify-center items-center gap-12">
        <h3 class="text-white text-3xl">YOU PICKED</h3>
        <button :class="[btns[getBtnIndex(player)].class, (result === 'YOU WIN' && 'relative ripple')]" >
          <component :is="btns[getBtnIndex(player)].icon" sizes="w-56 h-56" />
        </button>
      </div>

      <div :class="result ? 'scale-100' : 'scale-0'" class="flex flex-col justify-center items-center gap-12 text-white transition-all">
        <h3 class="font-bold text-6xl">{{ result }}</h3>
        <button
          class="bg-white text-xl rounded-lg text-background-radialTo px-12 py-4"
          @click="playAgain"
        >
          PLAY AGAIN
        </button>
      </div>

      <div v-if="computer !== 4" class="flex flex-col justify-center items-center gap-12">
        <h3 class="text-white text-3xl">THE HOUSE PICKED</h3>
        <button :class="[btns[computer].class, (result === 'YOU LOSE' && 'relative ripple')]" >
          <component :is="btns[computer].icon" sizes="w-56 h-56" />
        </button>
      </div>
      <div v-else class="flex flex-col justify-center items-center gap-12">
        <h3 class="text-white text-3xl">THE HOUSE PICKED</h3>
        <div class="w-72 h-72 rounded-full bg-black/30"></div>
      </div>
    </div>
  </section>
</template>