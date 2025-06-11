<template>
  <GenericToaster v-if="getToasterData.visible" :message="getToasterData.message" :type="getToasterData.type" />
  <main>
    <router-view />
  </main>
</template>

<script>
import GenericToaster from './GenericToaster.vue';
import { useUiStore } from '../js/stores/uiStore';
export default {
  name: 'App',
  setup(){
    const uiStore = useUiStore()
    return {
      uiStore
    }
  },
  components: {
    GenericToaster
  },
  computed: {
    getToasterData(){
      return this.uiStore.getToasterData;
    }
  },
  mounted(){
    setTimeout(() => {
      if(this.$route?.params?.lang){
        this.$i18n.locale = this.$route.params.lang || this.$i18n.fallbackLocale;
      }
    }, 200)
  }
};
</script>
