<script>
import { mapStores } from 'pinia';
import { usePatientStore } from '../stores/patient';

export default {
    name: "DetailPatientView",
    computed:{
      ...mapStores(usePatientStore)
    },
    method:{

    },
    created(){
      this.patientStore.fetchPatientById(this.$route.params.id)
    }
}
</script>
<template>
  <div class="flex justify-center items-center" v-if="patientStore.loading">
    <progress class="progress w-full"></progress>
  </div>
  <div class="container mx-auto my-8">
    <h1 class="text-center text-2xl">Patient Detail</h1>
    <h1 class="text-2xl font-bold mb-4">{{ patientStore.patient.name }}</h1>
    <div class="flex items-center space-x-4 mb-4">
      <i class="bi bi-gender-female" v-if="patientStore.patient.sex !== 'male'"></i>
      <i class="bi bi-gender-male" v-else></i>
      <span class="font-bold">{{ patientStore.patient.sex }}</span>
    </div>
    <div class="flex items-center space-x-4 mb-4">
      <i class="bi bi-browser-safari"></i>
      <span class="font-bold">{{ patientStore.patient.religion }}</span>
    </div>
    <div class="flex items-center space-x-4 mb-4">
      <i class="bi bi-telephone-fill"></i>
      <span class="font-bold">{{ patientStore.patient.phone }}</span>
    </div>
    <div class="flex items-center space-x-4 mb-4">
      <i class="bi bi-geo-alt-fill"></i>
      <span class="font-bold">{{ patientStore.patient.address }}</span>
    </div>
    <div class="flex items-center space-x-4 mb-4">
      <i class="bi bi-person-vcard"></i>
      <span class="font-bold">{{ patientStore.patient.nik }}</span>
    </div>
  </div>
</template>