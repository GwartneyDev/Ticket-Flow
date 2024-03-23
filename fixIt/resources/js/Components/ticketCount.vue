<template>
    <ul v-for="ticket in content.b" :key="ticket.id">
        <li>
            <p class="p-0.1 text-center bg-white" >{{ ticket }}</p>
        </li>
    </ul>
</template>

<script>
export default {
    props: ["content"],
};
</script>

<style scoped>
@import "~bootstrap/dist/css/bootstrap.css";
</style>
