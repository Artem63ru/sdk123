<template>
  <div class="demo">
    <form method="POST">
      <datepicker ref="datepicker" @click.native="method"></datepicker>
    </form>
    <input v-model="message" placeholder="отредактируй меня">
    <p>Введённое сообщение: {{ date }}</p>
<!--    <datepicker value="2018-9-5" format="YYYY-M-D" name="date2"></datepicker>-->
<!--    <datepicker :readonly="true" format="MMM/D/YYYY" name="date3"></datepicker>-->
  </div>

</template>

<script>
import datepicker from 'vue-date-picker'

export default {
  components: {
    datepicker
  }
}
</script>
