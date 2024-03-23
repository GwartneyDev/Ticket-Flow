<template>
    <div class="ticketVals" v-for="ticket in content.c" :key="ticket.id">
        <div class="row">
            <div class="col- status background">
                <p id="status">{{ ticket.status }}</p>
            </div>

            <div class="col- background padding">
                <p id="ticketId">
                    {{ ticket.id }}
                </p>
            </div>

            <div class="col background padding">
                <p id="slug">
                    <SVG></SVG>
                    <a :href="'/api/list/' + ticket.id + '/ticket'">{{
                        ticket.slug
                    }}</a>
                </p>
            </div>

            <div class="col background">
                <p class="names">
                    <userSvg></userSvg>
                    {{ ticket.assigned }}
                </p>
            </div>

            <div class="col background">
                <p id="date">
                    {{ moment(ticket.created_at).format("DD-MM-YYYY") }}
                </p>
            </div>

            <div class="col background">
                <p class="names">
                    <userSvg></userSvg>
                    {{ ticket.requested }}
                </p>
            </div>
        </div>
    </div>
</template>

<script>
import moment from "moment";

import SVG from "@/Components/svg";
import userSvg from "@/Components/userSvg";
export default {
    components: {
        SVG: SVG,
        userSvg: userSvg,
    },

    props: ["content"],

    data() {
        return {
            moment: moment,
        };
    },
};
</script>

<style scoped>
@import "~bootstrap/dist/css/bootstrap.css";

svg {
    display: inline;
    margin-right: 1rem;
}

.names {
    width: 11rem;
    color: black;
}

.background {
    /* background-color: #44444e; */
    border-bottom: solid;
    border-color: rgb(216, 216, 216);
}

.status {
    padding-left: 1rem;
}

#status {
    background-color: #04363d;
    color: white;
    border-radius: 5px;
    font-size: 12px;
    padding-left: 5px;
    padding-top: 1px;
    padding-right: 5px;
    padding-bottom: 2px;
    margin-top: 5px;
}

.row {
    margin-left: 0px;
}

li {
    list-style: none;
    display: grid;
    grid-auto-flow: column;
    color: white;
}

p {
    font-family: "Poppins", sans-serif;
    font-size: 1.1em;
    font-weight: 300;
    line-height: 1.7em;
}

a {
    color: black;
    text-decoration: none;
    transition: all 0.3s;
}
#ticketId {
    color: rgb(0, 0, 0);
    padding-left: 2rem;
}

.count {
    margin-bottom: -4px;
}

ul {
    margin-bottom: 30px;
}
#content {
    min-height: 100vh;
    background-color: #f8f8f8;
}

#slug {
    width: 27rem;
    color: black;
}
</style>
