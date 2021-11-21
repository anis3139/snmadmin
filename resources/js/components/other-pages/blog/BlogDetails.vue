<template>
  <div>
    <!-- Start Page Title -->
    <div class="page-title-area">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <h2>{{ title }}</h2>
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

    <!-- Start Blog Details Area -->
    <section class="blog-details-area ptb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-12">
            <div class="blog-details-desc">
              <div class="article-image">
                <img :src="image" alt="image" />
              </div>

              <div class="article-content">
                <div class="entry-meta">
                  <ul>
                    <li>
                      <feather type="clock"></feather>
                      <a href="#">{{moment(publishDate).format('MMMM Do, YYYY')  }}</a>
                    </li>
                    <li>
                      <feather type="user"></feather>
                      <a href="#">{{ published_by }}</a>
                    </li>
                  </ul>
                </div>

                <h3>{{ title }}</h3>

                <p>{{description}}</p>
              </div>

              <div class="article-footer" v-if='tags.nameBn!=""  '>
                <div class="article-tags">
                  <a href="#" >{{ tags.nameBn }}</a>
                </div>
              </div>

              <!-- <div class="startp-post-navigation">
                <div class="prev-link-wrapper">
                  <div class="info-prev-link-wrapper">
                    <a href="#">
                      <span class="image-prev">
                        <img src="../../../assets/img/blog-image/2.jpg" alt="image" />
                        <span class="post-nav-title">Prev</span>
                      </span>

                      <span class="prev-link-info-wrapper">
                        <span class="prev-title">Don't buy a tech gift until you read these rules</span>
                        <span class="meta-wrapper">
                          <span class="date-post">January 21, 2020</span>
                        </span>
                      </span>
                    </a>
                  </div>
                </div>

                <div class="next-link-wrapper">
                  <div class="info-next-link-wrapper">
                    <a href="#">
                      <span class="next-link-info-wrapper">
                        <span class="next-title">The golden rule of buying a phone as a gift</span>
                        <span class="meta-wrapper">
                          <span class="date-post">January 21, 2020</span>
                        </span>
                      </span>

                      <span class="image-next">
                        <img src="../../../assets/img/blog-image/3.jpg" alt="image" />
                        <span class="post-nav-title">Next</span>
                      </span>
                    </a>
                  </div>
                </div>
              </div> -->

              <!-- <div class="comments-area">
                <h3 class="comments-title">2 Comments:</h3>

                <ol class="comment-list">
                  <li class="comment">
                    <article class="comment-body">
                      <footer class="comment-meta">
                        <div class="comment-author vcard">
                          <img
                            src="../../../assets/img/client-image/1.jpg"
                            class="avatar"
                            alt="image"
                          />
                          <b class="fn">John Jones</b>
                          <span class="says">says:</span>
                        </div>

                        <div class="comment-metadata">
                          <a href="#">
                            <time>April 24, 2019 at 10:59 am</time>
                          </a>
                        </div>
                      </footer>

                      <div class="comment-content">
                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                      </div>

                      <div class="reply">
                        <a href="#" class="comment-reply-link">Reply</a>
                      </div>
                    </article>

                    <ol class="children">
                      <li class="comment">
                        <article class="comment-body">
                          <footer class="comment-meta">
                            <div class="comment-author vcard">
                              <img
                                src="../../../assets/img/client-image/2.jpg"
                                class="avatar"
                                alt="image"
                              />
                              <b class="fn">Steven Smith</b>
                              <span class="says">says:</span>
                            </div>

                            <div class="comment-metadata">
                              <a href="#">
                                <time>April 24, 2019 at 10:59 am</time>
                              </a>
                            </div>
                          </footer>

                          <div class="comment-content">
                            <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                          </div>

                          <div class="reply">
                            <a href="#" class="comment-reply-link">Reply</a>
                          </div>
                        </article>
                      </li>

                      <ol class="children">
                        <li class="comment">
                          <article class="comment-body">
                            <footer class="comment-meta">
                              <div class="comment-author vcard">
                                <img
                                  src="../../../assets/img/client-image/3.jpg"
                                  class="avatar"
                                  alt="image"
                                />
                                <b class="fn">Sarah Taylor</b>
                                <span class="says">says:</span>
                              </div>

                              <div class="comment-metadata">
                                <a href="#">
                                  <time>April 24, 2019 at 10:59 am</time>
                                </a>
                              </div>
                            </footer>

                            <div class="comment-content">
                              <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                            </div>

                            <div class="reply">
                              <a href="#" class="comment-reply-link">Reply</a>
                            </div>
                          </article>
                        </li>
                      </ol>
                    </ol>
                  </li>

                  <li class="comment">
                    <article class="comment-body">
                      <footer class="comment-meta">
                        <div class="comment-author vcard">
                          <img
                            src="../../../assets/img/client-image/4.jpg"
                            class="avatar"
                            alt="image"
                          />
                          <b class="fn">John Doe</b>
                          <span class="says">says:</span>
                        </div>

                        <div class="comment-metadata">
                          <a href="#">
                            <time>April 24, 2019 at 10:59 am</time>
                          </a>
                        </div>
                      </footer>

                      <div class="comment-content">
                        <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                      </div>

                      <div class="reply">
                        <a href="#" class="comment-reply-link">Reply</a>
                      </div>
                    </article>

                    <ol class="children">
                      <li class="comment">
                        <article class="comment-body">
                          <footer class="comment-meta">
                            <div class="comment-author vcard">
                              <img
                                src="../../../assets/img/client-image/5.jpg"
                                class="avatar"
                                alt="image"
                              />
                              <b class="fn">James Anderson</b>
                              <span class="says">says:</span>
                            </div>

                            <div class="comment-metadata">
                              <a href="#">
                                <time>April 24, 2019 at 10:59 am</time>
                              </a>
                            </div>
                          </footer>

                          <div class="comment-content">
                            <p>Lorem Ipsum has been the industry’s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen.</p>
                          </div>

                          <div class="reply">
                            <a href="#" class="comment-reply-link">Reply</a>
                          </div>
                        </article>
                      </li>
                    </ol>
                  </li>
                </ol>

                <div class="comment-respond">
                  <h3 class="comment-reply-title">Leave a Reply</h3>

                  <form class="comment-form">
                    <p class="comment-notes">
                      <span id="email-notes">Your email address will not be published.</span>
                      Required fields are marked
                      <span class="required">*</span>
                    </p>
                    <p class="comment-form-comment">
                      <label>Comment</label>
                      <textarea
                        name="comment"
                        id="comment"
                        cols="45"
                        rows="5"
                        maxlength="65525"
                        required="required"
                      ></textarea>
                    </p>
                    <p class="comment-form-author">
                      <label>
                        Name
                        <span class="required">*</span>
                      </label>
                      <input type="text" id="author" name="author" required="required" />
                    </p>
                    <p class="comment-form-email">
                      <label>
                        Email
                        <span class="required">*</span>
                      </label>
                      <input type="email" id="email" name="email" required="required" />
                    </p>
                    <p class="comment-form-url">
                      <label>Website</label>
                      <input type="url" id="url" name="url" />
                    </p>
                    <p class="comment-form-cookies-consent">
                      <input
                        type="checkbox"
                        value="yes"
                        name="wp-comment-cookies-consent"
                        id="wp-comment-cookies-consent"
                      />
                      <label
                        for="wp-comment-cookies-consent"
                      >Save my name, email, and website in this browser for the next time I comment.</label>
                    </p>
                    <p class="form-submit">
                      <input
                        type="submit"
                        name="submit"
                        id="submit"
                        class="submit"
                        value="Post Comment"
                      />
                    </p>
                  </form>
                </div>
              </div> -->
            </div>
          </div>

          <div class="col-lg-4 col-md-12">
            <aside class="widget-area" id="secondary">
              <section class="widget widget_search">
                <form class="search-form">
                  <label>
                    <span class="screen-reader-text">Search for:</span>
                    <input type="search" class="search-field" placeholder="Search..." />
                  </label>
                  <button type="submit">
                    <feather type="search"></feather>
                  </button>
                </form>
              </section>

              <!-- <section class="widget widget_startp_posts_thumb">
                <h3 class="widget-title">Latest Posts</h3>

                <article class="item" v-for="news of newsAll" :key="news.id">
                  <a href="#" class="thumb">
                    <span class="fullimage cover" role="img" :style='{ backgroundImage: `url("${news.image}")` }'></span>
                  </a>
                  <div class="info">
                    <time datetime="2019-06-30"> {{ moment(news.publishDate).format('Do-MMM-YYYY') }}</time>
                    <h4 class="title usmall">
                      <router-link
                    :to="{
                      name: 'blog-details',
                      params: { id: news.id },
                    }"
                  >{{ news.title.substring(0,50)+"..."  }}</router-link>
                    
                    </h4>
                  </div>

                  <div class="clear"></div>
                </article>

               

                
              </section> -->

              <section class="widget widget_categories">
                <h3 class="widget-title">Categories</h3>

                <ul>
                  <li v-for="cat of cats" :key="cat.id">
                    <router-link :to="{
                      name: 'BlogCat',
                      params: { id: cat.id },
                    }">{{ cat.nameBn }}</router-link>
                  </li>
                  
                </ul>
              </section>

              <!-- <section class="widget widget_archive">
                <h3 class="widget-title">Archives</h3>

                <ul>
                  <li>
                    <a href="#">May 2019</a>
                  </li>
                  <li>
                    <a href="#">April 2019</a>
                  </li>
                  <li>
                    <a href="#">June 2019</a>
                  </li>
                </ul>
              </section> -->

              <!-- <section class="widget widget_meta">
                <h3 class="widget-title">Meta</h3>

                <ul>
                  <li>
                    <a href="#">Log in</a>
                  </li>
                  <li>
                    <a href="#">
                      Entries
                      <abbr title="Really Simple Syndication">RSS</abbr>
                    </a>
                  </li>
                  <li>
                    <a href="#">
                      Comments
                      <abbr title="Really Simple Syndication">RSS</abbr>
                    </a>
                  </li>
                  <li>
                    <a href="#">WordPress.org</a>
                  </li>
                </ul>
              </section> -->

              <section class="widget widget_tag_cloud">
                <h3 class="widget-title">Tags</h3>

                <div class="tagcloud">
                  <a href="#" v-for="allTag of tagAll" :key="allTag.id">
                    {{ allTag.nameBn }}
                    <!-- <span class="tag-link-count">(3)</span> -->
                  </a>
                 
                </div>
              </section>
            </aside>
          </div>
        </div>
      </div>
    </section>
    <!-- End Blog Details Area -->
  </div>
</template>

<script>
import axios from "axios";
export default {
  name: "BlogDetails",
  data() {
    return {
      errors: [],
      errorsCat: [],
      errorstagAll: [],
      errorsNews: [],
      title: "",
      image:'',
      description:'',
      publishDateBn:'',
      published_by:'',
      tags:'',
      cats:[],
      tagAll:[],
      newsAll:[],
    };
  },
  mounted() {
    this.getData();
    this.getCatData();
    this.getTagData();
    axios
      .get("api/v1/news/book/recent/all")
      .then((response) => {
        this.newsAll = response.data.data;
        console.log(response.data.data);
      })
      .catch((error) => {
        this.errorsNews.push(error);
      });
  },
  
  methods: {
    getData() {
      axios
        .get(`api/v1/news/view/${this.$route.params.id}`)
        .then((res) => {
          this.title = res.data.data.title;
          this.image = res.data.data.image;
          this.description = res.data.data.description;
          this.publishDateBn = res.data.data.publishDateBn;
          this.tags = res.data.data.tag;
          this.published_by = res.data.data.published_by;

         
        })
        .catch((error) => {
          this.errors.push(error);
        });
    },
    getCatData(){
        axios
        .get('api/v1/category/all')
        .then((res) => {
            this.cats = res.data.data;
          
        })
        .catch((error) => {
          this.errorsCat.push(error);
        });
    },
    getTagData(){
        axios
        .get('api/v1/tag/all')
        .then((res) => {
            this.tagAll = res.data.data;
          
        })
        .catch((error) => {
          this.errorstagAll.push(error);
        });
    }
  },
};
</script>

<style scoped>
.bgi{
  background-image: url();
}
</style>