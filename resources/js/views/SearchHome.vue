
<template>
    <main>
        <Header />
        <div>
        <Search />
            <router-view> </router-view>
        </div>
        <Footer />
        <FlashMessage position="right bottom"> </FlashMessage>
    </main>
</template>

<script>
    import Header from './Header.vue';
    import Search from './Search.vue';
    import Footer from './Footer.vue';

    export default { 
        components: {
            Header,
            Search,
            Footer
        },
        data(){
        },
        mounted(){
        },
        methods:{
        }

    }
</script>