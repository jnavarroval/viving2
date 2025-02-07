<template>
 <nav aria-label="Page navigation example" class="d-md-flex align-items-center justify-content-between">
    <span>{{ __('showing') }} {{ meta.from }} {{ __('to') }} {{ meta.to }} {{__('of')}} {{ meta.total }} {{ __('item')}}</span>
  <ul class="pagination mb-0 mt-3 mt-md-0 d-flex gap-2 ">
    <li class="page-item" v-if="meta.current_page != 1"><button class="page-link" @click="onPageChange(meta.current_page - 1)"><i class="bi bi-arrow-left fs-3"></i></button></li>
    <li v-for="page in meta.last_page" :key="page" class="page-item" :class="{active: page == meta.current_page}"><button class="page-link" @click="onPageChange(page)">{{ page }}</button></li>
    <li class="page-item" v-if="meta.current_page != meta.last_page"><button class="page-link" @click="onPageChange(meta.current_page + 1)"><i class="bi bi-arrow-right fs-3"></i></button></li>
  </ul>
</nav>
</template>
<script>
export default {
    props:{
        meta:{
        },

    },
    methods:{
        onPageChange(page){
            if(page != this.meta.current_page){
                this.$emit('onPageChange',{ page: page})
            }
        }
    }
}
</script>

<style scoped>
.page-link{
    width: 40px!important;
    height: 40px!important;
}
</style>
