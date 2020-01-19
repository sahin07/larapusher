<template>
    <div>
        <toolbar></toolbar>
        <router-view></router-view>
        <app-footer></app-footer>
    </div>
</template>

<script>
import toolbar from './Toolobar'
import AppFooter from './AppFooter'
export default {
components:{toolbar,AppFooter}
}
</script>
