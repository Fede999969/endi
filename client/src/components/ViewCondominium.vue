<template>
  <div class="">
    <div class="">
      <h1 class="">{{ condominium.name }}</h1>
      <h2 class="">
        {{ condominium.city }}
      </h2>
    </div>
    <div class="">
      <div class="">
        <img class="" :src="condominium.photo" alt="" />
      </div>
      <div class="">
        <div
          v-for="field in fields"
          :key="field.code"
          class=""
        >
          <span>
            {{ field.label }}
          </span>
          <span class="">
            {{ condominium[field.code] }}
          </span>
        </div>
      </div>
    </div>
    <div>
      <button
        @click="goToList()"
        class=""
      >
        Torna indietro
      </button>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "ViewCondominium",
  data() {
    return {
      condominium: {},
      fields: [
        {
          label: "Tipo di contabilizzazione",
          code: "accounting",
          type: "select",
          options: [
            {
              label: "Diretta",
              code: "direct",
            },
            {
              label: "Indiretta",
              code: "indirect",
            },
          ],
          label: "Tipologia di sonda",
          code: "probe",
          type: "select",
          options: [
            {
              label: "Compatta",
              code: "compact",
            },
            {
              label: "Remota",
              code: "remote",
            },
          ],
          label: "Tipologia di dispositivi",
          code: "devices",
          type: "select",
          options: [
            {
              label: "Ripartitori di calore",
              code: "cal1",
            },
            {
              label: "Totalizzatore di calore",
              code: "cal2",
            },
            {
              label: "Contatore di energia termica",
              code: "energy",
            },
          ],
        },
        {
          label: "Nome",
          code: "name",
          type: "text",
        },
        {
          label: "Foto",
          code: "photo",
          type: "text",
        },
        {
          label: "Città",
          code: "city",
          type: "text",
        },
        {
          label: "Provincia",
          code: "province",
          type: "text",
        },
        {
          label: "Indirizzo",
          code: "street",
          type: "text",
        },
        {
          label: "CAP",
          code: "CAP",
          type: "number",
        },
        {
          label: "Numero appartamenti",
          code: "apartments",
          type: "number",
        },
        {
          label: "Gestione remota",
          code: "remote",
          type: "check",
        },
      ],
    };
  },
  async mounted() {
    let condominiumId = this.$route.params.id;

    let response = await axios.get(
      "http://localhost:8000/api/condominiums/" + condominiumId
    );
    console.log(response);
    this.condominium = response.data;
  },
  methods: {
    goToList() {
      this.$router.push("/");
    },
  },
};
</script>
