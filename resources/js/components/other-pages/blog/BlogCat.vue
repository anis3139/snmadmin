<template>
    <div>
        <!-- Start Page Title -->
        <div class="page-title-area">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container">
                        <h2>Category</h2>
                    </div>
                </div>
			</div>
			
			<div class="shape1"><img src="../../../assets/img/shape1.png" alt="shape"></div>
			<div class="shape2 rotateme"><img src="../../../assets/img/shape2.svg" alt="shape"></div>
			<div class="shape3"><img src="../../../assets/img/shape3.svg" alt="shape"></div>
			<div class="shape4"><img src="../../../assets/img/shape4.svg" alt="shape"></div>
			<div class="shape5"><img src="../../../assets/img/shape5.png" alt="shape"></div>
			<div class="shape6 rotateme"><img src="../../../assets/img/shape4.svg" alt="shape"></div>
			<div class="shape7"><img src="../../../assets/img/shape4.svg" alt="shape"></div>
			<div class="shape8 rotateme"><img src="../../../assets/img/shape2.svg" alt="shape"></div>
        </div>
        <!-- End Page Title -->

        <!-- Start Blog Area -->
		<section class="blog-area ptb-80">
			<div class="container">
				<div class="row">
					<div class="col-lg-4 col-md-6" v-for="CatData of allCatData" :key="CatData.id">
						<div class="single-blog-post">
							<div class="blog-image">
								<router-link
                  :to="{
                      name: 'blog-details',
                      params: { id: CatData.id },
                    }"
                >
                  <img :src=" CatData.image" alt="image" />
                </router-link>

                <div class="date">
                  <feather type="calendar"></feather>
                  {{ moment(CatData.publishDate).format('Do-MMM-YYYY') }}
                </div>
              </div>

              <div class="blog-post-content">
                <h3>
                  <router-link
                    :to="{
                      name: 'blog-details',
                      params: { id: CatData.id },
                    }"
                  >{{ CatData.title }}</router-link>
                </h3>

                <span>
                  by
                  <a href="#">{{ CatData.published_by }}</a>
                </span>

                <p>{{ CatData.description.substring(0,200)+"..." }}</p>
                <router-link class="read-more-btn"
                  :to="{
                      name: 'blog-details',
                      params: { id: CatData.id },
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
								<jw-pagination :items="pageOfItems" @changePage="onChangePage" :pageSize="3"></jw-pagination>
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
    name: 'BlogCat',
    data() {
    return {
      errors: [],
    allCatData:[],
    pageOfItems: [],
    };
  },
  mounted() {
    axios
      .get(`api/v1/news/category/${this.$route.params.id}`)
      .then((response) => {
        this.pageOfItems = response.data.data;
       
      })
      .catch((error) => {
        this.errors.push(error);
      });
  },
  methods: {
    onChangePage(pageOfItems) {
      this.allCatData = pageOfItems;
    },
  },
  
    
}
</script>