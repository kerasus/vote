<template>
    <div class="v--collapse-group">
        <slot v-if="loading"></slot>
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
                categories: [],
                loading : true
            }
        },
        mounted() {
            this.getData();
            Event.listen('userChoiceUpdated', (data) => this.updateData(data));
            Event.listen('categoryCollapsed', (collapsedCategory) => this.collapseOtherCategory(collapsedCategory))
        },
        methods: {
            getData() {
                axios.get('/api/v1')
                    .then(({data}) => {
                        this.categories = data.map(category => new Category(category))
                        this.loading = false;
                    })
            },
            updateData(data) {
                for (let cat in this.categories) {
                    if (this.categories[cat].id === data.category.id) {
                        
                        let temp = new Category(data.category);
                        temp.isDefault = 1;
                        Vue.set(this.categories, cat, temp);
                        
                    }
                }
            },
            collapseOtherCategory(collapsedCategory) {
                for (let cat in this.categories) {
                    let temp = this.categories[cat];
                    if (temp.id !== collapsedCategory.id ) {
                       if(temp.isDefault) {
                           temp.isDefault = 0;
                           Vue.set(this.categories, cat, temp);
                       }
                    }
                }
            }
        },
        comments: {
            category
        }
    }
</script>

<style scoped>

</style>
