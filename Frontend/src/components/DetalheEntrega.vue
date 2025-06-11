<script setup>
import { ref } from 'vue';

const entregaId = ref('');
const entrega = ref(null);
const erro = ref('');

async function buscarEntregaPorId() {
  erro.value = '';
  entrega.value = null;

  if (!entregaId.value) {
    erro.value = 'Informe um ID de entrega válido';
    return;
  }

  try {
    const res = await fetch(`http://127.0.0.1:8000/api/entregas/${entregaId.value}`);
    if (!res.ok) {
      const data = await res.json();
      erro.value = data.mensagem || 'Erro ao buscar entrega';
      return;
    }
    entrega.value = await res.json();
  } catch (e) {
    erro.value = 'Erro de conexão';
  }
}
</script>

<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="col-12 col-md-8 col-lg-6">
        <h2 class="text-center mb-4">Buscar Entrega por ID</h2>

        <div class="row g-2 mb-3">
          <div class="col-8">
            <input
              v-model="entregaId"
              type="text"
              class="form-control"
              placeholder="Digite o ID da entrega"
              @keyup.enter="buscarEntregaPorId"
            />
          </div>
          <div class="col-4">
            <button @click="buscarEntregaPorId" class="btn btn-dark w-100">
              Buscar entrega
            </button>
          </div>
        </div>

        <div v-if="erro" class="alert alert-danger">
          {{ erro }}
        </div>

        <div v-if="entrega" class="card mb-4">
          <div class="card-header">
            Entrega: {{ entrega.id }}
          </div>
          <div class="card-body">
            <p><strong>Volumes:</strong> {{ entrega.volumes }}</p>
            <p><strong>CPF do Destinatário:</strong> {{ entrega.cpf_destinatario }}</p>

            <h5 class="mt-3">Transportadora</h5>
            <p><strong>Nome Fantasia:</strong> {{ entrega.transportadora.fantasia }}</p>
            <p><strong>CNPJ:</strong> {{ entrega.transportadora.cnpj }}</p>

            <h5 class="mt-3">Remetente</h5>
            <p><strong>Nome:</strong> {{ entrega.remetente.nome }}</p>

            <h5 class="mt-3">Destinatário</h5>
            <p><strong>Nome:</strong> {{ entrega.destinatario.nome }}</p>
            <p><strong>CPF:</strong> {{ entrega.destinatario.cpf }}</p>
            <p>
              <strong>Endereço:</strong>
              {{ entrega.destinatario.endereco }}, {{ entrega.destinatario.estado }},
              {{ entrega.destinatario.cep }}, {{ entrega.destinatario.pais }}
            </p>
            <p><strong>Coordenadas:</strong> {{ entrega.destinatario.latitude }}, {{ entrega.destinatario.longitude }}</p>

            <h5 class="mt-3">Rastreamentos</h5>
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
</template>
