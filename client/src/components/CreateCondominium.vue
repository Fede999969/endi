<template>
  <div class="w-full max-w-screen-md mx-auto py-8 px-3">
          <h1 class="">Aggiungi un nuovo Condominio</h1>
    <div class="flex flex-col mb-3" v-for="field in fields" :key="field.code">
      <label class="mb-2 font-bold text-blue-900" :for="field.code">{{
        field.label
      }}</label>
      <input
        v-if="field.type == 'text'"
        class="border border-gray-200 p-2 rounded"
        type="text"
        :id="field.code"
        v-model="newCondominium[field.code]"
      />
      <input
        v-if="field.type == 'number'"
        class="border border-gray-200 p-2 rounded"
        type="number"
        :id="field.code"
        v-model="newCondominium[field.code]"
      />
      <select
        v-if="field.type == 'select'"
        class="border border-gray-200 p-2 rounded"
        :name="field.code"
        :id="field.code"
        v-model="newCondominium[field.code]"
      >
        <option
          v-for="option in field.options"
          :key="option.code"
          :value="option.code"
        >
          {{ option.label }}
        </option>
      </select>
      <textarea
        v-if="field.type == 'check'"
        v-model="newCondominium[field.code]"
        class=""
        :id="field.code"
      >
      </textarea>
    </div>
    <div class="pt-3">
      <button
        @click="createCondominium()"
        :disabled="!formIsValid"
        class="disabled:bg-gray-300 disabled:cursor-not-allowed p-2 px-3 rounded bg-blue-800 text-white"
      >
        {{ $route.name == "edit_condominium" ? "Salva" : "Crea" }}
      </button>
    </div>
  </div>
</template>
<script>
import axios from "axios";

export default {
  name: "CreateCondominium",
  data() {
    return {
      fields: [
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
          label: "Numero Appartamenti",
          code: "apartments",
          type: "number",
        },
        {
          label: "Consumo Complessivo ultimo anno",
          code: "consumption",
          type: "number",
        },
        {
          label: "Gestione remota",
          code: "remote",
          type: "check",
        },
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
        },
        {
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
        },
        {
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
      ],
      newCondominium: {
        name: "",
        photo: "",
        city: "",
        province: "",
        street: "",
        CAP: "",
        apartments: 0,
        consumption: 0,
        remote: 0,
        accounting: "direct",
        probe: "compact",
        devices: "cal1",
      },
    };
  },
  async mounted() {
    if (this.$route.name == "edit_condominium") {
      let response = await axios.get(
        "http://localhost:8000/api/condominiums/" + this.$route.params.id
      );
      this.newCondominium = response.data;
    }
  },
  methods: {
    async createCondominium() {
            let response;
            if (this.isEdit) {
                response = await axios.put("http://localhost:8000/api/condominiums/edit/" + this.$route.params.id, this.newCondominiums);
            }
            else if(!this.isEdit) {
                response = await axios.post("http://localhost:8000/api/condominiums/create/", this.newCondominiums);
            }
            console.log(this.newCondominiums);
            
            console.log(response.data);

            this.$router.push("/");
        }
    },
  computed: {
    formIsValid() {
      return (
        this.newCondominium.name != "" &&
        this.newCondominium.photo != "" &&
        this.newCondominium.city != "" &&
        this.newCondominium.province != "" &&
        this.newCondominium.street != "" &&
        this.newCondominium.CAP != "" &&
        this.newCondominium.apartments > 0 &&
        this.newCondominium.consumption > 0 &&
        this.newCondominium.remote != "" &&
        this.newCondominium.accounting != "" &&
        this.newCondominium.probe != "" &&
        this.newCondominium.devices != ""
      );
    },
  },
};
</script>
