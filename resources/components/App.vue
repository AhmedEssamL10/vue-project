<template>
  <div>
    <nav>
      <router-link to="/app">Dashboard</router-link> |
      <router-link to="/app/profile">Profile</router-link>
    </nav>
    <router-view />
  </div>
</template>

<script>
export default {
  name: 'App',
};
</script>
