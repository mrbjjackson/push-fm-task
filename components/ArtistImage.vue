<template>
    <img :src="image" :title="name" />
</template>
<script>
export default {
  name: 'ArtistImage',
  data: function () {
    return {
      count: 0
    }
  },
  props: ['name','image','id' ],
}
</script>
<style>

</style>