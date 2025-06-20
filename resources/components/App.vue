<template>
  <Teleport to="body">
    <GenericToaster v-if="getToasterData.visible" :message="getToasterData.message" :type="getToasterData.type" />
  </Teleport>
  <template v-if="languageIsReady">
    <router-view />
  </template>
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
  data(){
    return {
      languageIsReady: false,
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
      this.languageIsReady = true;
    }, 200)
  }
};
</script>
