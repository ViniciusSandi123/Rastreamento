<template>
  <div id="app" class="bg-orange min-vh-100">
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
      <a class="navbar-brand" href="#">Rastreamento</a>
      <div class="collapse navbar-collapse">
        <ul class="navbar-nav me-auto">
          <li class="nav-item">
            <router-link class="nav-link" to="/">Buscar por CPF</router-link>
          </li>
          <li class="nav-item">
            <router-link class="nav-link" to="/entrega">Buscar por ID</router-link>
          </li>
        </ul>
      </div>
    </nav>

    <main class="container py-4">
      <router-view />
    </main>
  </div>
</template>

<script>
export default {
  name: 'App'
}
</script>

<style>
.bg-orange {
  background-color: #FFA726;
}

.min-vh-100 {
  min-height: 100vh;
}
</style>
