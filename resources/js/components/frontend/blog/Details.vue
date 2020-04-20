<template>
    <span>
    <section id="content">
      <div class="container">
        <div class="row">
          
          

          <Sidebar/>



          <div class="span8">
            <article>
              <div class="row">
                <div class="span8">
                  <div class="post-image">
                    <div class="post-heading">
                      <h3><a href="#">{{post.title}}</a></h3>
                    </div>
                    <img :src="`img/${post.photo}`" alt="" />
                  </div>
                  <p>{{post.description}}</p>
                  <div class="bottom-article">
                    <ul class="meta-post">
                      <li v-if="post.user"><i class="icon-user"></i><a href="#"> {{post.user.name}}</a></li>
                      <li v-if="post.category"><i class="icon-folder-open"></i><a href="#"> {{post.category.cat_name}}</a></li>
                      <li><i class="icon-tags"></i><a href="#">Web design</a></li>
                    </ul>
                  </div>
                </div>
              </div>
            </article>
          </div>
        </div>
      </div>
    </section>
    </span>
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
        this.singlePost();
    },
    computed:
    {
        post()
        {
            return this.$store.getters.singlePost;
        }
    },
    methods:
    {
      singlePost()
      {
        this.$store.dispatch('singlePost',this.$route.params.id)
      }
    },
    watch:
    {
      $route(to,from)
      {
        this.singlePost();
      }
    }
}
</script>