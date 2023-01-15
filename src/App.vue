<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

import Header from './components/Header.vue';
import Rules from './components/Rules.vue';
import Game from './components/Game.vue';
import Results from './components/Results.vue';

const score = ref(0)
const id = ref(0)
const gameType = ref("play")
const playerSelect = ref("")

const setPlayer = (select) => {
  playerSelect.value = select
  gameType.value = "result"
}

const setScore = async (result) => {
  if (result === 'YOU WIN') {
    try {
      score.value = score.value + 1
      await axios.post('http://localhost/sccore/api/update.php', { id: id.value, score: score.value })
    } catch (error) {
      console.log(error);
    }
  }
}

const changeGameType = () => {
  gameType.value = "play"
}

const getScore = async () => {
  try {
    const { data } = await axios.get('http://localhost/sccore/api/read.php')
    if (data && data.score) {
      score.value = parseInt(data.score)
      id.value = data.id
    }
    else {
      const { data } = await axios.post('http://localhost/sccore/api/create.php', { score: 0 })
      if (data && data.message === "Score Created") {
        score.value = 0
        id.value = parseInt(data.id)
      }
    }
  } catch (error) {
    console.log(error);
  }
}

onMounted(() => {
  getScore()
})

</script>

<template>
  <div class="container mx-auto p-8">
    <Header :score="score" />
    <Game v-if="gameType === 'play'" @set-player-select="setPlayer" />
    <Results v-else :player="playerSelect" @play-again="changeGameType" @set-score="setScore" />
    <Rules />
  </div>
</template>