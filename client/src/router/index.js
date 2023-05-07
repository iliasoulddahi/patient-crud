import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'PatientList',
      component: () => import('../views/PatientListView.vue')
    },
    {
      path: '/patient-list',
      name: 'PatientList',
      component: () => import('../views/PatientListView.vue')
    },
    {
      path: '/add-new-patient',
      name: 'AddNewPatient',
      component: () => import('../views/AddNewPatientView.vue')
    },
    {
      path: '/edit-patient/:id',
      name: 'EditPatient',
      component: () => import('../views/EditPatientView.vue')
    },
    {
      path: '/detail-patient/:id',
      name: 'DetailPatient',
      component: () => import('../views/DetailPatientView.vue')
    }
  ]
})

export default router
