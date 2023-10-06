<template>
    <Head title="Welcome to Portofolio" />

    <FrontendLayout>
        <!-- Hero primary -->
        <Hero />

        <!-- Promote tail-100 -->
        <Promote />

        <!-- About secondary -->
        <About />

        <!-- Skills tail-100 -->
        <Skills :skills="skills" />

        <!-- Portfolio primary -->
        <Portfolio :skills="skills" :projects="projects" />

        <!-- Services secondary -->
        <Services />

        <!-- Contact primary -->
        <Contact />
    </FrontendLayout>
</template>

<script setup>
import { Link, Head } from "@inertiajs/vue3";
import FrontendLayout from "@/Layouts/FrontendLayout.vue";
import Hero from "@/Components/Frontend/Hero.vue";
import Promote from "@/Components/Frontend/Promote.vue";
import About from "@/Components/Frontend/About.vue";
import Skills from "@/Components/Frontend/Skills.vue";
import Services from "@/Components/Frontend/Services.vue";
import Portfolio from "@/Components/Frontend/Portfolio.vue";
import Contact from "@/Components/Frontend/Contact.vue";

defineProps({
    skills: Object,
    projects: Object,
});
</script>

<style></style>
