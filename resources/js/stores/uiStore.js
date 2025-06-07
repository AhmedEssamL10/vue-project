import { defineStore } from 'pinia'

export const useUiStore = defineStore('uiStore', {
    state: () => ({
      toaster: {
        type: null, // 'success' or 'error'
        duration: 3000, // default duration
        title: '',
        message: '',
        visible: false,
      }
    }),
    getters: {
      getToasterData: (state) => state.toaster,
    },
    actions: {
      setToaster(toasterData) {
        this.toaster.type = toasterData.type;
        this.toaster.duration = toasterData.duration;
        this.toaster.title = toasterData.title;
        this.toaster.message = toasterData.message;
        this.toaster.visible = true;
        setTimeout(() => {
          this.toaster.visible = false;
        }, toasterData.duration);
      }
    }
})