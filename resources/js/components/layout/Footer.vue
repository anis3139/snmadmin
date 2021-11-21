<template>
    <!-- Start Footer Area -->
    <footer class="footer-area bg-f7fafd">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <div class="logo">
                            <a href="/">
                                <img src="../../assets/img/logo.png" width="150px" alt="logo" />
                            </a>
                        </div>
                        <p>আমার ক্লায়েন্ট ই দিচ্ছে কাস্টমার এবং কর্মী ম্যানেজ করার সহজ, সাশ্রয়ী এবং ডিজিটাল সলিউশন যা মোবাইল এবং কম্পিউটার দুটোতেই ব্যবহার করা সম্ভব।</p>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget pl-5">
                        <h3 class="ml-3">Menu</h3>
                        <ul class="list">
                            <li><router-link to="/" class="nav-link">মূলপাতা </router-link></li>
                            <li><router-link to="/about-style-one" class="nav-link">বিস্তারিত </router-link></li>
                            <li><router-link to="/blog-grid" class="nav-link">ব্লগ </router-link></li>
                            <li><router-link to="/contact" class="nav-link">যোগাযোগ</router-link></li>
                            <li> <router-link to="/privacy-policy" class="nav-link">প্রাইভেসি পলিসি</router-link></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Support</h3>
                        <ul class="list">
                            <li><a href="#">FAQ's</a></li>
                            <li><router-link to="/privacy-policy">Privacy Policy</router-link></li>
                            <li><a href="#">Terms & Condition</a></li>
                            <li><a href="#">Community</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h3>Address</h3>
                        
                        <ul class="footer-contact-info">
                            <li><feather type="map-pin"></feather> House# 411,  Flat# 3B,  Road# 29,  New DOHS Mohakhali, Dhaka</li>
                            <li><feather type="mail"></feather> Email: <a href="mailto:support@amarclient.com" style="font-size:16px;">support@amarclient.com</a></li>
                            <li><feather type="phone-call"></feather> Phone: <a href="tel:+8809696863000"> +8809696863000</a></li>
                            <li><feather type="phone-call"></feather> Phone: <a href="tel:+8801774444000"> +8801774444000</a></li>
                        </ul>
                       
                    </div>
                </div>

                <div class="col-lg-12 col-md-12">
                    <div class="copyright-area">
                        <p>কপিরাইট © ২০২১ আমার ক্লায়েন্ট - সর্ব স্বত্ব সংরক্ষিত</p>
                    </div>
                </div>
            </div>
        </div>

        <img src="../../assets/img/map.png" class="map" alt="map">
        <div class="shape1"><img src="../../assets/img/shape1.png" alt="shape"></div>
        <div class="shape8 rotateme"><img src="../../assets/img/shape2.svg" alt="shape"></div>
        <!-- <div class="go-top"><feather type="arrow-up"></feather></div> -->

        <back-to-top bottom="50px" right="50px">
            <div class="go-top"><feather type="arrow-up"></feather></div>
        </back-to-top>
    </footer>
    <!-- End Footer Area -->
</template>

<script>
import BackToTop from 'vue-backtotop'
export default {
    name: 'Footer',
    components: { BackToTop }
}
</script>
<style scoped>
.nav-link {
    padding: 0rem 1rem;
}
</style>