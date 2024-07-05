
<template>
    <main>
        <Header />
        <div>
            <router-view> </router-view>
        </div>
        <Footer />
        <FlashMessage position="right bottom"> </FlashMessage>
    </main>
</template>

<script>
    import Header from './Header.vue';
    import SearchBar from './Search.vue';
    import Footer from './Footer.vue';

    export default { 
        components: {
            Header,
            SearchBar,
            Footer
        }
       

    }
</script>