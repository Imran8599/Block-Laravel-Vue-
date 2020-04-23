<template>
    <span>
        <div class="span4">
            <aside class="left-sidebar">
                <div class="widget">
                <form class="form-search">
                    <input placeholder="Type something" @keyup="search" v-model="search_input" type="text" class="input-medium search-query">
                    <button type="submit" @click.prevent="search" class="btn btn-square btn-theme">Search</button>
                </form>
                </div>
                <div class="widget">
                <h5 class="widgetheading">Categories</h5>
                <ul class="cat">
                    <li v-for="category in allCategory" :key="category.id"><i class="icon-angle-right"></i><router-link :to="`/category/${category.id}`">{{category.cat_name}}</router-link><span> (20)</span></li>
                </ul>
                </div>
                <div class="widget">
                <h5 class="widgetheading">Latest posts</h5>
                <ul class="recent">
                    <li v-for="post in latestPost" :key="post.id">
                        <img :src="`img/${post.photo}`" class="pull-left" alt="" width="25%"/>
                        <h6><router-link :to="`/details/${post.id}`">{{post.title}}</router-link></h6>
                        <p>
                            {{post.description}}
                        </p>
                    </li>
                </ul>
                </div>
                <div class="widget">
                <h5 class="widgetheading">Popular tags</h5>
                <ul class="tags">
                    <li><a href="#">Web design</a></li>
                    <li><a href="#">Trends</a></li>
                    <li><a href="#">Technology</a></li>
                    <li><a href="#">Internet</a></li>
                    <li><a href="#">Tutorial</a></li>
                    <li><a href="#">Development</a></li>
                </ul>
                </div>
            </aside>
        </div>
    </span>
</template>

<script>
import _ from 'lodash';
export default {
    data()
    {
        search_input = ''
    },
    mounted()
    {
        this.$store.dispatch('getAllCategory');
        this.$store.dispatch('latestPost');
    },
    computed:
    {
        allCategory()
        {
            return this.$store.getters.getCategory;
        },
        latestPost()
        {
            return this.$store.getters.latestPost;
        }
    },
    methods:
    {
        search:_.debounce(function(){
            this.$store.dispatch('search',this.search_input);
        },1000)
    }

}
</script>