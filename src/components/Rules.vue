<script setup>
  import { ref } from 'vue'
  import {
    Dialog,
    DialogPanel,
    DialogTitle,
    DialogDescription,
  } from '@headlessui/vue'

  import RulesSvg from '../assets/rules.svg'

  const isOpen = ref(false)

  const setIsOpen = (value) => {
    isOpen.value = value
  }
</script>

<template>
  <div class="fixed right-0 bottom-0 p-8">
    <button
      class="bg-background-radialTo border border-neutral-headerOutline rounded-lg text-white px-8 py-2 uppercase tracking-widest"
      @click="setIsOpen(!isOpen)"
    >
      Rules
    </button>
  </div>
  <Dialog :open="isOpen" @close="setIsOpen" class="bg-black/50 w-full h-screen top-0 fixed flex justify-center items-center">
    <DialogPanel class="bg-white rounded-xl w-full lg:w-1/3 mx-auto">
      <DialogTitle class="flex justify-between text-neutral-headerOutline p-8">
        <span class="text-3xl text-neutral-darkText">RULES</span>
        <button @click="setIsOpen(false)">
          <svg viewBox="0 0 24 24" width="24" height="24" stroke="currentColor" stroke-width="2" fill="none" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
        </button>
      </DialogTitle>
      <DialogDescription class="px-4 py-8 flex justify-center">
        <img :src="RulesSvg" alt="Rules" />
      </DialogDescription>

    </DialogPanel>
  </Dialog>
</template>