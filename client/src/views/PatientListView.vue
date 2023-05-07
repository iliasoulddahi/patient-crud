<script>
import { mapStores } from "pinia";
import { usePatientStore } from "../stores/patient";
import Swal from "sweetalert2";

export default {
  name: "PatientListView",
  computed: {
    ...mapStores(usePatientStore),
  },
  methods: {
    handleDelete(id) {
      Swal.fire({
        text: "Are u sure delete this patient?",
        showCancelButton: true,
        confirmButtonColor: "#3085b3",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          this.patientStore.deletePatient(id);
        }
      });
      
    },
  },
  created() {
    this.patientStore.fetchPatient();
  },
};
</script>

<template>
  <div class="flex justify-center items-center" v-if="patientStore.loading">
    <progress class="progress w-full"></progress>
  </div>
  <div class="">
    <h1 class="text-center text-2xl">Patient List</h1>
    <table class="table table-zebra w-full">
      <!-- head -->
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Sex</th>
          <th>Religion</th>
          <th>Phone</th>
          <th>Address</th>
          <th>NIK</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        <!-- row 1 -->
        <tr v-for="(patient, i) in patientStore.patients">
          <th>{{ i + 1 }}</th>
          <td>
            <p class="w-24 overflow-hidden">{{ patient.name }}</p>
          </td>
          <td>
            <p class="w-24 overflow-hidden">{{ patient.sex }}</p>
          </td>
          <td>
            <p class="w-24 overflow-hidden">{{ patient.religion }}</p>
          </td>
          <td>
            <p class="w-24 overflow-hidden">{{ patient.phone }}</p>
          </td>
          <td>
            <p class="w-24 overflow-hidden">{{ patient.address }}</p>
          </td>
          <td>
            <p class="w-24 overflow-hidden">{{ patient.nik }}</p>
          </td>
          <td>
            <div>
              <RouterLink
                :to="'detail-patient/' + patient.id"
                class="btn btn-xs"
                >Detail</RouterLink
              >
              <RouterLink
                :to="'edit-patient/' + patient.id"
                class="btn btn-xs mx-3"
                >Edit</RouterLink
              >
              <button
                @click.prevent="handleDelete(patient.id)"
                class="btn btn-xs"
              >
                Delete
              </button>
            </div>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
