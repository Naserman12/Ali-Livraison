<script setup> 
import { onMounted } from 'vue'
import { Html5QrcodeScanner } from 'html5-qrcode'
import axios from 'axios'
import Header from '@/Components/Header.vue'

const props = defineProps({
  orderId: Number,
  type: String // pickup or delivery
})
onMounted(() => {

  const scanner = new Html5QrcodeScanner(
    "reader",
    { fps: 10, qrbox: 250 }
  )

  scanner.render(async (decodedText) => {

    try {
      await axios.post(`/api/order/${props.orderId}/${props.type}-scan`, {
        code: decodedText
      })

      alert('✔ Success')
      scanner.clear()

    } catch (e) {
      alert('❌ Invalid QR')
    }

  })

})
</script>

<template>
  <Header />
  <div class="p-6">

    <h1 class="text-xl font-bold mb-4">
      📷 Scanner QR
    </h1>

    <div id="reader"></div>

  </div>
</template>