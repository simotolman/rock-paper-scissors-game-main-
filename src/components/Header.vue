<script setup>
import { defineProps } from 'vue'

defineProps(['score'])
</script>

<template>
  <header class="w-full lg:w-2/3 mx-auto border border-neutral-headerOutline rounded-xl px-8 py-6">
    <div class="flex flex-col lg:flex-row gap-8 justify-between">
      <h1 class="font-bold text-4xl flex flex-col text-white">
        <span>ROCK</span>
        <span>PAPER</span>
        <span>SCISSORS</span>
      </h1>
      <div class="bg-white py-4 px-8 flex flex-col justify-center items-center text-center rounded-lg">
        <h2 class="uppercase text-neutral-darkText">Score</h2>
        <span class="font-bold text-neutral-darkText text-5xl">
          {{ score }}
        </span>
      </div>
    </div>
  </header>
</template>