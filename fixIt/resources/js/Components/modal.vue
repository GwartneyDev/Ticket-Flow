<template>
    <ul v-for="qeues in content.a" :key="qeues.id">
        <li>
            <a class="text-dark" :href="'/api/list/' + qeues.id + '/tickets'">{{ qeues.qeue }}</a>
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
