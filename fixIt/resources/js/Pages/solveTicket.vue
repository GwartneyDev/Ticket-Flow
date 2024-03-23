<template>
    <div class="wrapper">
        <sidebar id="sidebar">
            <homesvg></homesvg>
        </sidebar>

        <div id="content">
            <nav>
                <div class="row" v-for="ticket in ticketInfo" :key="ticket.id">
                    <div class="col">
                        <h6 id="requestBy" class="text-center" >Requested:{{ ticket.requested }}</h6>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <select class="form-control" id="selectedAssigned">
                            <option value="" selected disabled>Choose</option>

                            <option
                                v-for="user in Users"
                                :value="user.name"
                                :key="user.id"
                            >
                                {{ user.name }}
                            </option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <select id="changePriority" class="form-control">
                            <option value="" selected disabled>priority</option>

                            <option
                                v-for="status in priority"
                                :value="status.status"
                                :key="status.id"
                            >
                                {{ status.status }}
                            </option>
                        </select>
                    </div>

                    <div class="col">
                        <select id="changeStatus" class="form-control">
                            <option value="" selected disabled>status</option>

                            <option
                                v-for="stats in status"
                                :value="stats.status"
                                :key="stats.id"
                            >
                                {{ stats.status }}
                            </option>
                        </select>
                    </div>
                </div>

                <div class="col d-flex ">
                    <button
                        @click="update()"
                        type="submit"
                        class="btn btn-primary my-2 mt-1"
                         
                        id="updateButton"
                    >   
                        Update
                    </button>
                </div>
            </nav>
        </div>

        <div class="container">
            <div
                class="row  mt-4"
                v-for="ticket in ticketInfo"
                :key="ticket.id"
            >
                <div class="col-">
                    <SVG id="messageSvg"></SVG>
                    {{ ticket.slug }}
                </div>
                <div class="col">
                    {{ moment(ticket.created_at).format("DD-MM-YYYY") }}
                </div>
                <div class="col">{{ ticket.assigned }}</div>
                <div class="col">
                    <button
                        @click="markDone"
                        type="submit"
                        class="btn btn-primary"
                        id="Done"
                    >
                        D
                    </button>
                </div>
                <div class="col">priority:{{ ticket.priorty }}</div>
                <div id="ticketStatus" class="col">{{ ticket.status }}</div>
            </div>

            <div class="row">
                <div class="col">
                    <h5>Request:</h5>
                </div>
            </div>
            
            <div class="row" v-for="ticket in ticketInfo" :key="ticket.id">
                <div class="col">
                    <div id="ticketBackground" p-1>
                        {{ ticket.body }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col"><h5>Ticket Reply:</h5></div>
            </div>

            <div id="borderTicketReply">
                <div
                    class="row ticketBodyContent"
                    v-for="reply in replys"
                    :key="reply.id"
                >
                    <div id="Replybody" class="col">
                        {{ reply.body }}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col ">
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1"
                            >Example textarea</label
                        >
                        <textarea
                            class="form-control"
                            id="submitReply"
                            rows="3"
                        ></textarea>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button
                        @click="submit"
                        type="submit"
                        class="btn btn-primary"
                    >
                        submit
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import GlobalComponents from "@/Components/components.js";
import moment from "moment";

export default {
    components: {
        ...GlobalComponents,
    },

    props: {
        ticketInfo: Array,
        replys: Array,
        Users: Array,
    },

    data() {
        return {
            moment: moment,
            showDropDown: false,
            UpdateStatus: "",

            ticketId: this.ticketInfo[0].id,
            priority: [
                { id: 1, status: 1 },
                { id: 2, status: 2 },
                { id: 3, status: 3 },
            ],

            status: [
                { id: 1, status: "O" },
                { id: 2, status: "H" },
            ],
        };
    },

    methods: {
        update() {
            var e = document.getElementById("changeStatus");
            var value = e.options[e.selectedIndex].value;

            var e2 = document.getElementById("changePriority");
            var value2 = e2.options[e2.selectedIndex].value;

            var e3 = document.getElementById("selectedAssigned");
            var value3 = e3.options[e3.selectedIndex].value;

            axios
                .post("/api/list/" + this.ticketId + "/ticket/update", {
                    data: {
                        status: value,
                        priority: value2,
                        assgined: value3,
                    },
                    _method: "patch",
                })
                .then(function (response) {
                    
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        submit() {
            var getReply = document.getElementById("submitReply").value;
            console.log(getReply);

            axios
                .post("/api/list/" + this.ticketId + "/ticket/submitReply", {
                    data: {
                        reply: getReply,
                        ticketId: this.ticketId,
                    },
                })
                .then(function (response) {
                   
                    location.reload();
                })
                .catch(function (error) {
                    console.log(error);
                });
        },

        markDone() {
            axios
                .delete(
                    "/api/list/" + this.ticketId + "/ticket/deleteTicket",
                    {}
                )
                .then(function () {
                    window.location.href = `/api/list/`;
                })
                .catch(function (error) {
                    console.log(error);
                });
        },
    },

    computed: {
        getStatus() {
            return this.ticketInfo;
        },
    },
};
</script>

<style scoped>
@import "~bootstrap/dist/css/bootstrap.css";
@import "../../css/MediaQ.css";

/* CSS FOR SOLVEtICET VUE ONLY */

#ticketBackground {
     background-color: #f7f7f7;
    
}

#border {
    border: 2px;
    border-style: solid;
    border-color: black;
    width: 100%;
}

#Done {
    border-radius: 100%;
}

.ticketContent {
    margin-top: 4rem;
    margin-bottom: 4rem;
}

.ticketBodyContent {
    margin-top: 3rem;
    margin-bottom: 2rem;
}

#replyBody {
    background-color: grey;
}
#borderTicketReply {
    border-style: solid;
    border-width: 5px;
}

#messageSvg {
    margin-right: 1rem;
}
</style>
