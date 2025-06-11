<script setup>
import { ref } from 'vue';

const cpf = ref('');
const entregas = ref([]);
const erro = ref('');

async function buscarEntregas() {
  erro.value = '';
  entregas.value = [];

  if (!cpf.value) {
    erro.value = 'Informe um CPF válido';
    return;
  }

  try {
    const res = await fetch(`http://127.0.0.1:8000/api/entregas?cpf=${cpf.value}`);
    if (!res.ok) {
      const data = await res.json();
      erro.value = data.mensagem || 'Erro ao buscar entregas';
      return;
    }
    entregas.value = await res.json();
  } catch (e) {
    erro.value = 'Erro de conexão';
  }
}
</script>

<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <h2 class="text-center mb-4">Buscar Entregas por CPF</h2>

        <div class="row g-2 mb-3">
          <div class="col-8">
            <input
              v-model="cpf"
              type="text"
              class="form-control"
              placeholder="Digite o CPF"
              @keyup.enter="buscarEntregas"
            />
          </div>
          <div class="col-4">
            <button @click="buscarEntregas" class="btn btn-dark w-100">
              Buscar
            </button>
          </div>
        </div>

        <div v-if="erro" class="alert alert-danger" role="alert">
          {{ erro }}
        </div>

        <div v-if="entregas.length">
          <div
            v-for="entrega in entregas"
            :key="entrega.id"
            class="card mb-3"
          >
            <div class="card-header">
              Entrega: {{ entrega.id }}
            </div>
            <div class="card-body">
              <p><strong>Transportadora:</strong> {{ entrega.transportadora.fantasia }}</p>
              <p><strong>Volumes:</strong> {{ entrega.volumes }}</p>
              <p><strong>Remetente:</strong> {{ entrega.remetente.nome }}</p>
              <p>
                <strong>Destinatário:</strong>
                {{ entrega.destinatario.nome }} -
                {{ entrega.destinatario.endereco }},
                {{ entrega.destinatario.estado }}
              </p>

              <h5 class="mt-3">Rastreamentos:</h5>
              <ul class="list-group list-group-flush">
                <li
                  v-for="rastreamento in entrega.rastreamentos"
                  :key="rastreamento.id"
                  class="list-group-item"
                >
                  {{ rastreamento.data }} - {{ rastreamento.mensagem }}
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
