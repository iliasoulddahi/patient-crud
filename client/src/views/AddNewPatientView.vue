<script>
import { mapStores } from "pinia";
import { usePatientStore } from "../stores/patient";

export default {
  name: "AddNewPatientView",
  data() {
    return {
      name: "",
      sex: "",
      religion: "",
      phone: "",
      address: "",
      NIK: "",
    };
  },
  computed: {
    ...mapStores(usePatientStore),
  },
  methods: {
    handleSubmit() {
      this.patientStore.postPatient({
        name: this.name,
        sex: this.sex,
        religion: this.religion,
        phone: this.phone,
        address: this.address,
        nik: this.NIK,
      });
    },
  },
};
</script>

<template>
  <div class="flex justify-center items-center" v-if="patientStore.loading">
    <progress class="progress w-full"></progress>
  </div>
  <div class="p-6">
    <h1 class="text-center text-2xl">Add Patient</h1>
    <form class="max-w-sm mx-auto" @submit.prevent="handleSubmit">
      <div class="mb-4">
        <label for="name" class="block text-gray-700 font-bold mb-2"
          >Name</label
        >
        <input
          v-model="name"
          type="text"
          id="name"
          name="name"
          class="w-full border border-gray-400 p-2 rounded-md"
        />
      </div>

      <div class="mb-4">
        <label for="sex" class="block text-gray-700 font-bold mb-2">Sex</label>
        <select
          v-model="sex"
          id="sex"
          name="sex"
          class="w-full border border-gray-400 p-2 rounded-md"
        >
          <option value="" class="hidden">Select Patient</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>

      <div class="mb-4">
        <label for="religion" class="block text-gray-700 font-bold mb-2"
          >Religion</label
        >
        <input
          v-model="religion"
          type="text"
          id="religion"
          name="religion"
          class="w-full border border-gray-400 p-2 rounded-md"
        />
      </div>
      <div class="mb-4">
        <label for="phone" class="block text-gray-700 font-bold mb-2"
          >phone</label
        >
        <input
          v-model="phone"
          type="text"
          id="phone"
          name="phone"
          class="w-full border border-gray-400 p-2 rounded-md"
        />
      </div>
      <div class="mb-4">
        <label for="address" class="block text-gray-700 font-bold mb-2"
          >address</label
        >
        <input
          v-model="address"
          type="text"
          id="address"
          name="address"
          class="w-full border border-gray-400 p-2 rounded-md"
        />
      </div>
      <div class="mb-4">
        <label for="NIK" class="block text-gray-700 font-bold mb-2">NIK</label>
        <input
          v-model="NIK"
          type="number"
          id="NIK"
          name="NIK"
          class="w-full border border-gray-400 p-2 rounded-md"
        />
      </div>
      <div class="mb-4 flex justify-center">
        <button
          type="submit"
          class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-indigo-600"
        >
          Add Patient
        </button>
      </div>
    </form>
  </div>
</template>
