import { defineStore } from 'pinia'
import axios from 'axios'
import Swal from 'sweetalert2'

const swal = (boolean, string="")=>{
    Swal.fire({
        position: 'top-end',
        icon: boolean?'success':'error',
        title: string,
        showConfirmButton: false,
        timer: 1000
      })
} 

export const usePatientStore = defineStore('patient', {
    state: () => {
        return {
            patients:{},
            patient:{},
            apiUrl:"http://localhost/patient-crud/server/patient",
            loading:false
        }
    },
    actions: {
        async fetchPatient() {
            try {
                this.loading =true
                const {data} = await axios.get(this.apiUrl);
                this.patients = data?.result
                this.loading =false
                console.log(this.patients)
            } catch (error) {
                this.loading =false
                console.log(error)
            }
        },
        async fetchPatientById(id) {
            try {
                this.loading =true
                const {data} = await axios.get(this.apiUrl+"/"+id);
                this.patient = data?.result
                this.loading =false
            } catch (error) {
                console.log(error)
                this.loading =false
            }
        },
        async postPatient(patientData) {
            try {
                this.loading =true
                const { data } = await axios.post(this.apiUrl, patientData)
                this.router.push('/patient-list')
                swal(true, "add success")        
                this.loading =false      
            } catch (error) {
                console.log(error)
                this.loading =false
                swal(false, error?.response?.data?.status?.message?.message)
            }
        },
        async putPatient(patientData) {
            try {
                this.loading =true
                const { data } = await axios.put(this.apiUrl+"/"+patientData.id, patientData)
                this.router.push('/detail-patient/'+patientData.id)   
                swal(true,"update success")           
                this.loading =false
            } catch (error) {
                console.log(error)
                this.loading =false
                swal(false, error?.response?.data?.status?.message?.message)
            }
        },
        async deletePatient(id) {
            try {
                this.loading =true
                const { data } = await axios.delete(this.apiUrl+"/"+id)
                this.fetchPatient()
                this.router.push('/patient-list')             
                swal(true, "delete success") 
                this.loading =false
            } catch (error) {
                console.log(error)
                this.loading =false
                swal(false, error?.response?.data?.status?.message)
            }
        }
    }
})