<template>
 <div class="bg-grey-400 min-h-screen flex flex-row justify-between ml-5 mr-5">
    <div v-for="condominium in condominiums" :key="condominium.id" @click="goToCondominiumDetail(condominium)" class="flex flex-row w-1/4 h-2/5 bg-white shadow-md rounded text-center">
    <img class="h-24 w-24 mr-4" :src='condominium.name' />
    <div class="flex flex-col text-center">
            <div class="">
                <div>{{ condominium.photo }}</div>
                <span class="">In quale Città? {{ condominium.city }} {{ condominium.province }} {{ condominium.street }} {{ condominium.CAP }} </span>
            </div>
            <div class=""> Quanti appartamenti? {{ condominium.apartment }}
            </div>
            <div class="">
              <h1 class=""> Consumo complessivo? {{ condominium.consumption }}</h1>
            </div>
            <div class="">
              <h1 class=""> Gestione remota? {{ condominium.remote }}</h1>
            </div>
            <div class="">
              <h1 class=""> Tipo di contabilizzazione? {{ condominium.accounting }}</h1>
            </div>
            <div class="">
              <h1 class=""> Tipo di sonda? {{ condominium.probe }}</h1>
            </div>
            <div class="">
              <h1 class=""> Tipo di dispositivi? {{ condominium.devices }}</h1>
            </div>
            </div>
    </div>
 </div>
</template>
<script>
import axios from "axios";

export default {
  name: "ListCondominiums",
  data() {
    return {
      condominiums: [],
    };
  },
  async mounted() {
    let response = await axios.get("http://localhost:8000/api/condominiums");

    this.condominiums = response.data;
  },
  methods: {

    edit(condominium) {
      this.$router.push("/edit/" + condominium.id);
    },
    goToDetail(condominium) {
      this.$router.push("/view/" + condominium.id);
    },
    async deleteCondominium(condominium) {
      if (
        confirm(
          "Vuoi davvero eliminare il condominio: " + condominium.name + "?",
          "Si",
          "No"
        )
      ) {
        await axios.delete("http://localhost:8000/api/condominiums/" + condominium.id);
        await this.getCondominiums();
      }
    },
  },
};
</script>
