<template>
  <div>
    <!-- Start Page Title -->
    <div class="page-title-area">
      <div class="d-table">
        <div class="d-table-cell">
          <div class="container">
            <h2>Contact Us</h2>
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
    <div class="container">
      <div class="faq-accordion">
        <VueFaqAccordion :items="myItems" />
      </div>
    </div>
    <!-- Start Contact Info Area -->
    <section class="contact-info-area ptb-80">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="contact-info-box">
              <div class="icon">
                <feather type="mail"></feather>
              </div>
              <h3>Mail Here</h3>
              <p>
                <a href="#">support@amarclient.com</a>
              </p>
              <p>
                <a href="#">support@amarclient.com</a>
              </p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6">
            <div class="contact-info-box">
              <div class="icon">
                <feather type="map-pin"></feather>
              </div>
              <h3>Visit Here</h3>
              <p>House# 411, Flat# 3B, Road# 29, New DOHS Mohakhali, Dhaka</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-0 offset-md-3 offset-sm-3">
            <div class="contact-info-box">
              <div class="icon">
                <feather type="phone"></feather>
              </div>
              <h3>Call Here</h3>
              <p>
                <a href="tel:+8809696863000">+8809696863000</a>
              </p>
              <p>
                <a href="tel:+8801774444000">+8801774444000</a>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Info Area -->

    <!-- Start Contact Area -->
    <section class="contact-area ptb-80 pt-0 mt-5">
      <div class="container">
        <div class="section-title">
          <h2>Get In Touch With Us</h2>
          <div class="bar"></div>
          <p>Anything On your Mind. We’ll Be Glad To Assist You!</p>
        </div>

        <div class="row h-100 justify-content-center align-items-center">
          <div class="col-lg-6 col-md-12">
            <img src="../../../assets/img/1.png" alt="image" />
          </div>

          <div class="col-lg-6 col-md-12">
            <form id="contactForm" @submit.prevent="contactSubmit">
              <div class="row">
                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input
                      type="text"
                      name="name"
                      v-model="name"
                      id="name"
                      class="form-control"
                      required
                      data-error="Please enter your name"
                      placeholder="Name"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <input
                      type="email"
                      name="email"
                      v-model="email"
                      id="email"
                      class="form-control"
                      required
                      data-error="Please enter your email"
                      placeholder="Email"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-6">
                  <div class="form-group">
                    <input
                      type="text"
                      name="phone_number"
                      v-model="phone_number"
                      id="phone_number"
                      required
                      data-error="Please enter your number"
                      class="form-control"
                      placeholder="Phone"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-6">
                  <div class="form-group">
                    <input
                      type="text"
                      name="msg_subject"
                      v-model="msg_subject"
                      id="msg_subject"
                      class="form-control"
                      required
                      data-error="Please enter your subject"
                      placeholder="Subject"
                    />
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12">
                  <div class="form-group">
                    <textarea
                      name="message"
                      class="form-control"
                      id="message"
                      v-model="message"
                      cols="30"
                      rows="5"
                      required
                      data-error="Write your message"
                      placeholder="Your Message"
                    ></textarea>
                    <div class="help-block with-errors"></div>
                  </div>
                </div>

                <div class="col-lg-12 col-md-12">
                  <button type="submit" class="btn btn-primary">Send Message</button>
                  <div id="msgSubmit" class="h3 text-center hidden"></div>
                  <div class="clearfix"></div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- End Contact Area -->
  </div>
</template>

<script>
import VueFaqAccordion from "vue-faq-accordion";
import axios from "axios";

export default {
  name: "Contact",
  components: {
    VueFaqAccordion,
  },
  data() {
    return {
      text: `Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute.`,
      myItems: [
        {
          title: "আমি কিভাবে শুরু করতে পারি?",
          value:
            "আমার ক্লায়েন্ট ব্যবহার করার জন্য আপনাকে অবশ্যই নিবন্ধন করতে হবে নিবন্ধন আপনি মোবাইল অ্যাপ ব্যবহার করে বা ওয়েব সাইট ব্রাউজ করে কম্পিউটারের মাধ্যমে খুব সহজেই করতে পারবেন ।",
        },
        {
          title: "আমাকে প্রতি মাসে কত পেমেন্ট করতে হবে ?",
          value:
            "আপনাকে প্রতি মাসে সফটওয়্যারটি ব্যবহারের জন্য 250 টাকা সার্ভিস চার্জ প্রদান করতে হবে। আমাদের মাসিক প্যাকেজ টি 30 দিনের জন্য হয় ।",
        },
        {
          title:
            "আমি কি মাসিক ছাড়া আরো বেশি সময়ের জন্য  কোন প্যাকেজ কিনতে পারব ?",
          value:
            "আপনি মাসিক প্যাকেজ টি বাদ দিয়েও আমাদের অর্ধবার্ষিক বা বাৎসরিক প্যাকেজটি নিয়ে দেখতে পারেন আমাদের অর্ধবার্ষিক প্যাকেজটি 180 দিনের হয়, যার মূল্য 1200 টাকা এবং বাৎসরিক প্যাকেজটি 365 দিনের হয়, যার মূল্য 2000 টাকা।",
        },
        {
          title: "আমি কি ট্রায়াল নিয়ে দেখতে পারি ?",
          value:
            "অবশ্যই আপনি ট্রায়াল নিয়ে দেখতে পারেন। ট্রায়াল ব্যবহার করতে প্রমোশনাল কোড ব্যবহার করুন trial । এই কোডটি ব্যবহার করলে আপনি তিন দিন ট্রায়াল হিসাবে আমার ক্লায়েন্ট ব্যবহার করতে পারবেন।",
        },
        {
          title:
            "আমি কি প্রিন্টার ব্যবহার করে কাস্টমারদের কে ইনভয়েস অথবা বিল দিতে পারি ?",
          value:
            "অবশ্যই আপনার যদি প্রিন্টার থাকে তবে খুব সহজেই আমার ক্লাইন্ট এর মাধ্যমে ইনভয়েস অথবা বিল প্রিন্ট করে কাস্টমারদের কে প্রদান করতে পারবেন। ",
        },
        {
          title:
            "আমি যদি সফটওয়্যারটি ব্যবহার করতে গিয়ে কোন সমস্যায় পড়ি তাহলে কিভাবে সমাধান করতে পারি ?",
          value:
            "আপনি যদি আমার ক্লায়েন্ট ব্যবহার করতে গিয়ে কোন সমস্যায় পড়েন তবে আমাদের সাথে ইমেইলের মাধ্যমে অথবা সরাসরি ফোন করে কাস্টমার কেয়ার এক্সিকিউটিভ এর মাধ্যমে খুব সহজে সমস্যাটির সমাধান করতে পারেন।",
        },
      ],
      errors: [],
      name: "",
      email: "",
      phone_number: "",
      msg_subject: "",
      message: "",
    };
  },
  methods: {
    contactSubmit: function (event) {
      let data = {
        name: this.name,
        email: this.email,
        phone_number: this.phone_number,
        msg_subject: this.msg_subject,
        message: this.message,
      };

      axios
        .post("api/v1/contact", data)
        .then(function (res) {
          console.log(res.data);
          alert("Massage Send Successfully");
        })
        .catch((error) => {
          this.errors.push(error);
          alert("Something Went Wrong");
        });
      this.name = " ";
      this.email = " ";
      this.phone_number = " ";
      this.msg_subject = " ";
      this.message = " ";
      event.target.reset();
    },
  },
};
</script>