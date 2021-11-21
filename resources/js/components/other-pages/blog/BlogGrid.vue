<template>
  <div>
    <!-- Start Page Title -->
    <div class="page-title-area">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <h2>Blog</h2>
          </div>
        </div>
      </div>

      <div class="shape1">
        <img src="../../../assets/img/shape1.png" alt="shape" />
      </div>
      <div class="shape2 rotateme">
        <img src="../../../assets/img/shape2.svg" alt="shape" />
      </div>
      <div class="shape3">
        <img src="../../../assets/img/shape3.svg" alt="shape" />
      </div>
      <div class="shape4">
        <img src="../../../assets/img/shape4.svg" alt="shape" />
      </div>
      <div class="shape5">
        <img src="../../../assets/img/shape5.png" alt="shape" />
      </div>
      <div class="shape6 rotateme">
        <img src="../../../assets/img/shape4.svg" alt="shape" />
      </div>
      <div class="shape7">
        <img src="../../../assets/img/shape4.svg" alt="shape" />
      </div>
      <div class="shape8 rotateme">
        <img src="../../../assets/img/shape2.svg" alt="shape" />
      </div>
    </div>
    <!-- End Page Title -->

    <!-- Start Blog Area -->
    <section class="blog-area ptb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6" v-for="allNews of allNewses" :key="allNews.id">
            <div class="single-blog-post">
              <div class="blog-image">
                <router-link
                  :to="{
                      name: 'blog-details',
                      params: { id: allNews.id },
                    }"
                >
                  <img :src=" allNews.image" alt="image" />
                </router-link>

                <div class="date">
                  <feather type="calendar"></feather>
                  {{ moment(allNews.publishDate).format('Do-MMM-YYYY') }}
                </div>
              </div>

              <div class="blog-post-content">
                <h3>
                  <router-link
                    :to="{
                      name: 'blog-details',
                      params: { id: allNews.id },
                    }"
                  >{{ allNews.title }}</router-link>
                </h3>

                <span>
                  by
                  <a href="#">{{ allNews.published_by }}</a>
                </span>

                <p>{{ allNews.description.substring(0,200)+"..." }}</p>
                <router-link class="read-more-btn"
                  :to="{
                      name: 'blog-details',
                      params: { id: allNews.id },
                    }"
                >
                   Read More
                    <feather type="arrow-right"></feather>
                </router-link>
                
              </div>
            </div>
          </div>

          <div class="col-lg-12 col-md-12">
            <div class="pagination-area">
              <nav aria-label="Page navigation">
                <jw-pagination :items="pageOfItems" @changePage="onChangePage" :pageSize="9"></jw-pagination>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Blog Area -->
  </div>
</template>
<script>
import axios from "axios";
export default {
  name: "BlogGrid",
  data() {
    return {
      errors: [],
      allNewses: [],
      pageOfItems: [],
    };
  },

  mounted() {
    axios
      .get("api/v1/news/all")
      .then((response) => {
        this.pageOfItems = response.data.data;
      })
      .catch((error) => {
        this.errors.push(error);
      });
  },

  methods: {
    onChangePage(pageOfItems) {
      this.allNewses = pageOfItems;
    },
  },
};
</script>