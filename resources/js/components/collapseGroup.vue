<template>
    <div class="v--collapse-group">
        <category v-for="category in categories" :data="category" :key="category.id"></category>
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
                .then(({data}) => this.categories = data.map(category => new Category(category)))

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
