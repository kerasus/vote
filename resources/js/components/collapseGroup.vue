<template>
    <div class="v--collapse-group">
        <category v-for="category in categories" :data="category" :key="category.id" ref="c"></category>
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
            this.getData();
            Event.listen('userChoiceUpdated',(data) => this.updateData(data));
        },
        methods: {
            getData(){
                axios.get('/api/v1')
                    .then(({data}) => this.categories = data.map(category => new Category(category)))
            },
            updateData(data) {
                let updatedCategory = data.category;
                updatedCategory = new Category(updatedCategory);
                updatedCategory.isDefault = 1;
                
                for (let cat in this.categories){
                    if(this.categories[cat].id === updatedCategory.id){
                        console.log("WIN!");
                        Vue.set(this.categories,cat, updatedCategory);
                    }
                }
                // let elem = this.$el;
                //
                // elem.scrollTop = 1500;
            }
        },
        comments: {
            category
        }
    }
</script>

<style scoped>

</style>
