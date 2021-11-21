<template>
    <div>
        <Banner></Banner>
        <BoxesArea></BoxesArea>
        <Services></Services>
        <ServicesArea></ServicesArea>
        <Features></Features>
        <Pricing></Pricing>
        <Funfacts></Funfacts>
        <Feedback></Feedback>
        <Blog></Blog>
    </div>
</template>

<script>
import Banner from './it-startup/Banner';
import BoxesArea from './it-startup/BoxesArea';
import Services from './it-startup/Services';
import ServicesArea from './it-startup/ServicesArea';
import Features from './it-startup/Features';
import Pricing from './it-startup/Pricing';
import Feedback from './it-startup/Feedback';
import Blog from './it-startup/Blog';
import Funfacts from './it-startup/Funfacts';
export default {
    name: 'ITStartup',
    components: {
        Banner,
        BoxesArea,
        Services,
        ServicesArea,
        Features,
        Pricing,
        Feedback,
         Funfacts,
        Blog
    }
}
</script>