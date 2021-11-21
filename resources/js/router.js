import VueRouter from 'vue-router';
// Pages
import ITStartup from './components/landing-pages/ITStartup';

import AboutStyleOne from './components/other-pages/about/AboutStyleOne';
import Features from './components/other-pages/features/Features';
import FeatureDetails from './components/other-pages/features/FeatureDetails';
import ServicesOne from './components/other-pages/services/ServicesOne';
import ServicesTwo from './components/other-pages/services/ServicesTwo';
import ServicesThree from './components/other-pages/services/ServicesThree';
import ServicesFour from './components/other-pages/services/ServicesFour';
import ServicesFive from './components/other-pages/services/ServicesFive';
import ServiceDetails from './components/other-pages/services/ServiceDetails';
import ProjectStyleOne from './components/other-pages/projects/ProjectStyleOne';
import ProjectStyleTwo from './components/other-pages/projects/ProjectStyleTwo';
import ProjectDetails from './components/other-pages/projects/ProjectDetails';
import Team from './components/other-pages/team/Team';
import Pricing from './components/other-pages/pricing/Pricing';
import Faq from './components/other-pages/faq/Faq';
import NotFound from './components/other-pages/not-found/NotFound';
import ComingSoon from './components/other-pages/coming-soon/ComingSoon';
import BlogGrid from './components/other-pages/blog/BlogGrid';
import BlogCat from './components/other-pages/blog/BlogCat';
import BlogDetails from './components/other-pages/blog/BlogDetails';
import Contact from './components/other-pages/contact/Contact';
import Shop from './components/other-pages/product/Shop';
import Cart from './components/other-pages/product/Cart';
import Checkout from './components/other-pages/product/Checkout';
import ItemDetails from './components/other-pages/product/ItemDetails';
import privacyPolicy from './components/other-pages/privacy-policy/privacyPolicy';
import VersionLog from './components/other-pages/version-log/VersionLog';

export const router = new VueRouter({
    mode: 'history',
    linkExactActiveClass: 'active',
    scrollBehavior() {
      return { x: 0, y: 0 };
    },
    routes: [
      { path: '/', component: ITStartup },
      { path: '/about-style-one', component: AboutStyleOne },
      { path: '/features', component: Features },
      { path: '/feature-details', component: FeatureDetails },
      { path: '/service-style-one', component: ServicesOne },
      { path: '/service-style-two', component: ServicesTwo },
      { path: '/service-style-three', component: ServicesThree },
      { path: '/service-style-four', component: ServicesFour },
      { path: '/service-style-five', component: ServicesFive },
      { path: '/service-details', component: ServiceDetails },
      { path: '/project-style-one', component: ProjectStyleOne },
      { path: '/project-style-two', component: ProjectStyleTwo },
      { path: '/project-details', component: ProjectDetails },
      { path: '/team', component: Team },
      { path: '/pricing', component: Pricing },
      { path: '/faq', component: Faq },
      { path: '/coming-soon', component: ComingSoon },
      { path: '/not-found', component: NotFound },
      { path: '/blog-grid', component: BlogGrid },
      { path: '/blog-details/:id', name: 'blog-details', component: BlogDetails },
      { path: '/category/:id', name: 'BlogCat', component: BlogCat },
      { path: '/contact', component: Contact },
      { path: '/shop', component: Shop },
      { path: '/cart', component: Cart },
      { path: '/checkout', component: Checkout },
      { path: '/details', component: ItemDetails },
      { path: '/privacy-policy', component: privacyPolicy },
      { path: '/version-log', component: VersionLog },
    ]
});