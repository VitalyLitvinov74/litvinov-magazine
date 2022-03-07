<template>
    <div>
        <NuxtLink to="/">Home page</NuxtLink>
        <NuxtLink to="product">Product page</NuxtLink>
        <slot name="content"></slot>
    </div>
</template>

<script>
    export default {
        name: 'IndexPage'
    }
</script>
<style>
    @import "../template/mioca/assets/css/vendor/bootstrap.bundle.min.css";
    @import "../template/mioca/assets/css/vendor/pe-icon-7-stroke.css";
    @import "../template/mioca/assets/css/vendor/font.awesome.css";
    @import "../template/mioca/assets/css/plugins/animate.css";
    @import "../template/mioca/assets/css/plugins/swiper-bundle.min.css";
    @import "../template/mioca/assets/css/plugins/jquery-ui.min.css";
    @import "../template/mioca/assets/css/plugins/nice-select.css";
    @import "../template/mioca/assets/css/plugins/venobox.css";
    @import "../template/mioca/assets/css/style.css";
</style>
