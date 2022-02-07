<template>
  <div class="flex items-center p-3 bg-blue-200">
    <div @click="goToList()" class="cursor-pointer">
      <span class="text-blue-900 font-bold"> ENDI </span>
    </div>
    <div class="ml-auto">
      <button @click="createCondominium()" class="p-2 text-blue-900">
        Crea Condominio
      </button>
    </div>
  </div>
</template>
<script>
export default {
  name: "Navigation",
  methods: {
    createCondominium() {
      this.$router.push({
        name: "create_condominium",
      });
    },
    goToList() {
      this.$router.push({
        name: "list_condominiums",
      });
    },
  },
};
</script>
