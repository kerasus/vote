<template>
    <div class="v--collapse-group">
        <category v-for="c in categories" :data="c"></category>
    </div>
</template>

<script>
    import category from './category'
    import Category from "../model/Category";

    export default {
        name: "collapseGroup",
        data() {
            return {
                categories: []
            }
        },
        mounted() {
            axios.get('/api/v1')
                .then(({data}) => this.categories = data.map(c => new Category(c)))

        },
        methods: {
        },
        comments: {
            category
        }
    }
</script>

<style scoped>

</style>
