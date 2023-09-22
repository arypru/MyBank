<template>
    <div>
      <h3>Rutas</h3>
      <ul>
        <li class="black--text" v-for="route in $router.options.routes" :key="route.path">
          {{ route.path }}
          {{ route.children }}
        </li>
      </ul>
    </div>
</template>