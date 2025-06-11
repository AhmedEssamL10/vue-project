import { createI18n } from 'vue-i18n';
import ar from './locales/ar.json'
import de from './locales/de.json'

const i18n = createI18n({
  locale: 'ar',
  fallbackLocale: 'de',
  messages: {
    ar,
    de,
  }
});

export default i18n;