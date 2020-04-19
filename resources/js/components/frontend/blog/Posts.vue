<template>
    <div id="posts">
        <section id="content">
            <div class="container">
                <div class="row">
                    

                    <!-- Side Bar -->
                    <Sidebar/>

                    <div class="span8">
                        <article v-for="post in allPost" :key="post.id">
                            <div class="row">
                                <div class="span8">
                                    <div class="post-image">
                                        <div class="post-heading">
                                        <h3><a href="#">{{post.title}}</a></h3>
                                        </div>
                                        <img :src="`img/${post.photo}`" alt="">
                                    </div>
                                    <p>
                                        {{post.description}}
                                    </p>
                                    <div class="bottom-article">
                                        <ul class="meta-post">
                                        <li><i class="icon-calendar"></i><a href="#"> {{post.created_at | dateformat}}</a></li>
                                        <li><i class="icon-user"></i><a href="#"> {{post.user.name}}</a></li>
                                        <li><i class="icon-folder-open"></i><a href="#"> {{post.category.cat_name}}</a></li>
                                        <li><i class="icon-comments"></i><a href="#">4 Comments</a></li>
                                        </ul>
                                        <router-link :to="`/details/${post.id}`" class="pull-right">Continue reading <i class="icon-angle-right"></i></router-link>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <div id="pagination">
                            <span class="all">Page 1 of 3</span>
                            <span class="current">1</span>
                            <a href="#" class="inactive">2</a>
                            <a href="#" class="inactive">3</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>

import Sidebar from './Sidebar';

export default {
    components:
    {
        Sidebar
    },
    mounted()
    {
        this.$store.dispatch('getPost');
    },
    computed:
    {
        allPost()
        {
            return this.$store.getters.getPost;
        }
    },
    methods:
    {

    }
}
</script>